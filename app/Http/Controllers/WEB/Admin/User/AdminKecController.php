<?php

namespace App\Http\Controllers\WEB\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AdminKec\CreateRequest;
use App\Http\Requests\User\AdminKec\UpdateRequest;
use App\Models\Kecamatan;
use App\Models\Role;
use App\Models\User;
use App\Models\User\AdminKec;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;


class AdminKecController extends Controller
{

    protected $user;

    protected $adminkec;

    protected $kecamatan;


    public function __construct(User $user, AdminKec $adminkec, Kecamatan $kecamatan)
    {
        $this->user = $user;
        $this->adminkec = $adminkec;
        $this->kecamatan = $kecamatan;
    }
    public function index()
    {
        $adminkec = $this->adminkec->all();
        $kecamatan = $this->kecamatan->all();

        return view('admin.pages.user.admin-kec.index', compact('kecamatan', 'adminkec'));
    }

    public function create()
    {
        $kecamatan = $this->kecamatan->all();
        $adminKecId = $this->adminkec::pluck('kecamatan');
        return view('admin.pages.user.admin-kec.create', compact('kecamatan', 'adminKecId'));
    }

    public function store(CreateRequest $request)
    {
        try {
            DB::beginTransaction();

            $user = $this->user->create($request->all() + [
                'password' => Hash::make($request->password),
            ]);
            $user->assignRole(Role::findById($this->user::ADMIN_KEC));

            $this->adminkec->create([
                'user_id' => $user->id,
                'kecamatan' => $request->kecamatan,
            ]);

            $user->setFillableAttributes();
            $user->email_verified_at = Carbon::now();
            $user->remember_token = Str::random(10);
            $user->save();


            DB::commit();
            Alert::success('Success', 'Success Create Admin Kecamatan');
            return redirect('/admin/kab/create/admin-kec')->with('Data Admin Kecamatan Berhasil Di Buat');
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($e->errors());
        } catch (ValidationException $th) {
            DB::rollBack();
            Alert::error('Error', $th->getMessage());
            return back()->with('error', 'Data Owner Gagal Di Buat' . $th->getMessage());
        }
    }

    public function edit($id)
    {
        $kecamatan = $this->kecamatan->all();
        $user = $this->adminkec->findOrFail($id);
        return view('admin.pages.user.admin-kec.update', compact('user', 'kecamatan'));
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $user = $this->adminkec->findOrFail($id);
            $user->update([
                'kecamatan' => $request->kecamatan,
            ]);
            $user->userkec->update([
                'name' => $request->name,
                'email' => $request->email
            ]);

            DB::commit();

            Alert::success('Succses', 'Akun Admin kecamatan Berhasil Diubah');
            return redirect('/admin/kab/create/admin-kec')->with('success', 'Admin kecamatan updated successfully');
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($e->errors());
        } catch (\Exception $th) {
            DB::rollback();
            Alert::error('Error', 'Akun Admin kecamatan Gagal Diubah' . $th->getMessage());
            return back()->with('error', 'Admin kecamatan updated failed' . $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $user = $this->adminkec->findOrFail($id);
            $user->userkec->delete();
            $user->delete();

            DB::commit();

            Alert::success('Succses', 'Akun Client Berhasil Dihapus');
            return redirect('/admin/kab/create/admin-kec')->with('success', 'Admin Kecamatan deleted successfully');
        } catch (\Exception $th) {
            DB::rollback();
            Alert::error('Error', 'Akun Client Gagal Dihapus' . $th->getMessage());
            return back()->with('error', 'Admin Kecamatan deleted failed' . $th->getMessage());
        }
    }
}
