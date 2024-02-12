<?php

namespace App\Http\Controllers\WEB\AdminKec\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AdminDes\CreateRequest;
use App\Http\Requests\User\AdminDes\UpdateRequest;
use App\Models\Desa;
use App\Models\User;
use App\Models\Role;
use App\Models\User\AdminDes;
use App\Models\User\AdminKec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;



class AdminDesController extends Controller
{

    protected $adminkec;
    protected $admindes;
    protected $user;
    protected $desa;


    public function __construct(AdminKec $adminkec, AdminDes $admindes, User $user, Desa $desa)
    {
        $this->adminkec = $adminkec;

        $this->admindes = $admindes;

        $this->user = $user;

        $this->desa = $desa;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->id();
        $userKecamatanId = $this->adminkec->where('user_id', $userId)->pluck('kecamatan')->first();
        $desa = $this->desa->where('district_id', $userKecamatanId)->get();
        $admindes = $this->admindes->where('user_kecamatan', $userId)->get();

        return view('admin_kecamatan.pages.user.admin-des.index', compact('desa', 'admindes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId = auth()->id();
        $userKecamatanId = $this->adminkec->where('user_id', $userId)->pluck('kecamatan')->first();
        $desa = $this->desa->where('district_id', $userKecamatanId)->get();
        $adminKecDesaId = $this->admindes->pluck('desa');
        return view('admin_kecamatan.pages.user.admin-des.create', compact('desa', 'adminKecDesaId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        try {
            DB::beginTransaction();

            $user = $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user->assignRole(Role::findById($this->user::ADMIN_DES));
            $user->setFillableAttributes();
            $user->email_verified_at = Carbon::now();
            $user->remember_token = Str::random(10);
            $user->save();

            $this->admindes->create([
                'user_id' => $user->id,
                'desa' => $request->desa,
                'user_kecamatan' => auth()->id(),
            ]);

            DB::commit();

            alert::success('success', 'Akun Admin Desa Berhasil Dibuat!');
            return redirect('/admin/kec/create/admin-des')->with('success', 'Admin Desa Berhasil Ditambahkan');
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
        } catch (\Exception $er) {
            DB::rollback();
            Alert::error('Error', 'Gagal Menambahkan Data' . $er->getMessage());
            return back()->with('error', 'Gagal Menambahkan Data' . $er->getMessage());
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
        $userId = auth()->id();
        $user = $this->adminkec->where('user_id', $userId)->pluck('kecamatan')->first();
        $userKecamatanId = $this->adminkec->where('user_id', $userId)->pluck('kecamatan')->first();
        $desa = $this->desa->where('district_id', $userKecamatanId)->get();

        $user = $this->admindes->findOrFail($id);
        return view('admin_kecamatan.pages.user.admin-des.update', compact('user', 'desa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        try {
            DB::beginTransaction();

            $user = $this->admindes->findOrFail($id);
            $user->update([
                'desa' => $request->desa,
            ]);
            $user->userdes->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            DB::commit();

            alert::success('success', 'Akun Admin Desa Berhasil Diupdate!');
            return redirect('/admin/kec/create/admin-des')->with('success', 'Admin Desa Berhasil Diupdate');
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
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $user = $this->admindes->findOrFail($id);
            $user->userdes->delete();
            $user->delete();

            DB::commit();

            alert::success('success', 'Akun Admin Desa Berhasil Dihapus!');
            return redirect('/admin/kec/create/admin-des')->with('success', 'Admin Desa Berhasil Dihapus');
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($e->errors());
        } catch (\Exception $th) {
            DB::rollback();
            Alert::error('Error', 'Akun Admin Desa Gagal Dihapus' . $th->getMessage());
            return back()->with('error', 'Admin Desa updated failed' . $th->getMessage());
        }
    }
}
