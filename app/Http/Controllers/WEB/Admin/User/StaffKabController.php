<?php

namespace App\Http\Controllers\WEB\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\StaffKabupaten;
use App\Models\Master\JabatanKabupaten;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Carbon\Carbon;


class StaffKabController extends Controller
{
    protected $staff;
    protected $user;
    protected $jabatan;
    protected $role;

    public function __construct(StaffKabupaten $staff, User $user, JabatanKabupaten $jabatan, Role $role)
    {
        $this->staff = $staff;
        $this->user = $user;
        $this->jabatan = $jabatan;
        $this->role = $role;
    }
    public function index()
    {
        $staff = $this->staff::all();
        return view('admin.pages.user.staff.sekretaris.index', compact('staff'));
    }

    public function create()
    {
        $jabatan = $this->jabatan::all();
        $staffId = $this->staff::pluck('jabatan_kabupaten_id');

        return view('admin.pages.user.staff.sekretaris.create', compact('jabatan', 'staffId'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = $this->user->create([
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'email' => $request->email,
            ]);
            $user->assignRole(Role::findById($this->user::STAFF_KAB));

            $user->setFillableAttributes();
            $user->email_verified_at = Carbon::now();
            $user->remember_token = Str::random(10);
            $user->save();

            $this->staff->create([
                'user_id' => $user->id,
                'jabatan_kabupaten_id' => $request->jabatan,
            ]);

            DB::commit();

            Alert::success('success', 'Data berhasil ditambahkan');
            return redirect('/admin/kab/create/staff')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollback();
            alert::error('error', 'Data Gagal Ditambahkan' . $e->getMessage());
            return back()->with('error', 'Data gagal ditambahkan');
        }
    }
}
