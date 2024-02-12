<?php

namespace App\Http\Controllers\WEB\AdminDes\User;

use App\Http\Controllers\Controller;
use App\Models\AdminDes\StaffDesa;
use App\Models\Desa;
use App\Models\Role;
use App\Models\User;
use App\Models\User\AdminDes;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StaffDesController extends Controller
{

    protected $user;
    protected $staff;

    protected $admindes;

    protected $desa;

    public function __construc(User $user, StaffDesa $staff, AdminDes $admindes, Desa $desa)
    {
        $this->user = $user;

        $this->staff = $staff;

        $this->desa = $desa;

        $this->admindes = $admindes;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin_desa.pages.user.staff.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin_desa.pages.user.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $adminKec = $this->admindes::where('user_id', Auth::id())->first();
        $desa = $adminKec ? $adminKec->desa : '';
        $WilayahDesa = $this->desa::where('id', $desa)->first();

        try {
            DB::beginTransaction();
            $user = $this->user->create([
                'name' => $request->name,
                'password' => bcrypt('password'),
                'email' => $request->email,
            ]);
            $user->assignRole(Role::findById($this->user::STAFF_DES));

            $user->setFillableAttributes();
            $user->email_verified_at = Carbon::now();
            $user->remember_token = Str::random(10);
            $user->save();

            $this->staff->create([
                'user_id' => $user->id,
                'desa_id' => $WilayahDesa->id,
                'jabatan_desa_id' => $request->jabatan,
            ]);

            DB::commit();
            alert::success('success', 'Staff Desa Berhasil Dibuat');
            return redirect('/admin/des/create/staff')->with('success', 'Staff Desa Berhasil Dibuat');
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($e->errors());
        } catch (QueryException $th) {
            DB::rollBack();
            if ($th->errorInfo[1] == 1062) {
                Alert::error('Error', 'Email sudah terdaftar, silakan gunakan email lain.');
                session()->flash('error', 'Email sudah terdaftar, silakan gunakan email lain.');
            } else {
                Alert::error('Error', $th->getMessage());
                session()->flash('error', $th->getMessage());
            }
            return back()->withInput();
        } catch (\Exception $r) {
            DB::rollBack();
            alert::error('error', 'data gagal ditambahkan' . $r->getMessage());
            return back()->with('error', 'data gagal ditambahkan' . $r->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin_desa.pages.user.staff.update');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
