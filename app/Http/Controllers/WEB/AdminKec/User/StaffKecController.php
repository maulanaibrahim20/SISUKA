<?php

namespace App\Http\Controllers\WEB\Adminkec\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StaffKec\CreateRequest;
use App\Models\AdminKec\JabatanKecamatan;
use App\Models\AdminKec\StaffKecamatan;
use App\Models\Kecamatan;
use App\Models\Role;
use App\Models\User;
use App\Models\User\AdminKec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;


class StaffKecController extends Controller
{
    protected $jabatan;
    protected $staff;

    protected $user;


    public function __construct(JabatanKecamatan $jabatan, StaffKecamatan $staff, User $user)
    {
        $this->jabatan = $jabatan;
        $this->staff = $staff;
        $this->user = $user;
    }
    public function index()
    {
        $kecamatan = Kecamatan::all();
        $adminKec = AdminKec::where('user_id', Auth::id())->first();
        $staff = $this->staff::where('kecamatan_id', $adminKec->kecamatan)->orderBy('created_at', 'asc')->get();
        return view('admin_kecamatan.pages.user.staff.index', compact('staff', 'kecamatan'));
    }

    public function create()
    {
        $jabatan = $this->jabatan::where('created_by', auth()->user()->name)->orderBy('created_at', 'asc')->get();
        $staff = $this->staff::pluck('jabatan_kecamatan_id');

        return view('admin_kecamatan.pages.user.staff.create', compact('jabatan', 'staff'));
    }

    public function store(CreateRequest $request)
    {
        $adminKec = AdminKec::where('user_id', Auth::id())->first();
        $kecamatan = $adminKec ? $adminKec->kecamatan : '';
        $WilayahKec = Kecamatan::where('id', $kecamatan)->first();

        try {
            DB::beginTransaction();
            $user = $this->user->create([
                'name' => $request->name,
                'password' => bcrypt('password'),
                'email' => $request->email,
            ]);
            $user->assignRole(Role::findById($this->user::STAFF_KEC));

            $user->setFillableAttributes();
            $user->email_verified_at = Carbon::now();
            $user->remember_token = Str::random(10);
            $user->save();

            $this->staff->create([
                'user_id' => $user->id,
                'kecamatan_id' => $WilayahKec->id,
                'jabatan_kecamatan_id' => $request->jabatan,
            ]);

            DB::commit();
            alert::success('success', 'Staff Kecamatan Berhasil Dibuat');
            return redirect('/admin/kec/create/staff')->with('success', 'Staff Kecamatan Berhasil Dibuat');
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

    public function edit($id)
    {
        $jabatan = $this->jabatan::where('created_by', auth()->user()->name)->orderBy('created_at', 'asc')->get();
        $staff = $this->staff->findOrFail($id);
        return view('admin_kecamatan.pages.user.staff.update', compact('staff', 'jabatan'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $staff = $this->staff::findOrFail($id);
            $staff->update([
                'jabatan_kecamatan_id' => $request->jabatan,
            ]);
            $staff->user->update([
                'name' => $request->name,
                'email' => $request->email
            ]);

            DB::commit();
            Alert::success('success', 'Data Berhasil Diubah');
            return redirect('/admin/kec/create/staff')->with('success', 'Data Berhasil Diubah');
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

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $staff = $this->staff::findOrFail($id);
            $staff->user->delete();
            $staff->delete();

            DB::commit();

            Alert::success('success', 'Data Berhasil Dihapus');
            return back()->with('success', 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('error', 'Data Gagal Ditambahkan' . $e->getMessage());
            return back()->with('error', 'Data gagal ditambahkan');
        }
    }
}
