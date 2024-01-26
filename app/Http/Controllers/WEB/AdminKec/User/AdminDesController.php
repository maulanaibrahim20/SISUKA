<?php

namespace App\Http\Controllers\WEB\AdminKec\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AdminDes\CreateRequest;
use App\Models\User;
use App\Models\Role;
use App\Models\User\AdminDes;
use App\Models\User\AdminKec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;



class AdminDesController extends Controller
{

    protected $adminkec;
    protected $admindes;
    protected $user;
    protected $wilayah = "https://emsifa.github.io/api-wilayah-indonesia/api/";


    public function __construct(AdminKec $adminkec, AdminDes $admindes, User $user)
    {
        $this->adminkec = $adminkec;

        $this->admindes = $admindes;

        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->id();
        $user = $this->adminkec->where('user_id', $userId)->pluck('kecamatan')->first();
        $response = Http::get($this->wilayah . "villages/" . $user . ".json");
        $desa = $response->json();
        $admindes = $this->admindes->where('user_kecamatan', $userId)->get();

        return view('admin_kecamatan.pages.user.admin-des.index', compact('desa', 'admindes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId = auth()->id();
        $user = $this->adminkec->where('user_id', $userId)->pluck('kecamatan')->first();
        $response = Http::get($this->wilayah . "villages/" . $user . ".json");
        $desa = $response->json();
        return view('admin_kecamatan.pages.user.admin-des.create', compact('desa'));
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
        } catch (ValidationException $th) {
            DB::rollBack();
            Alert::error('Error', $th->getMessage());
            return back()->with('error', 'Data Owner Gagal Di Buat' . $th->getMessage());
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
        $response = Http::get($this->wilayah . "villages/" . $user . ".json");
        $desa = $response->json();

        $user = $this->admindes->findOrFail($id);
        return view('admin_kecamatan.pages.user.admin-des.update', compact('user', 'desa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
        } catch (ValidationException $th) {
            DB::rollBack();
            Alert::error('Error', $th->getMessage());
            return back()->with('error', 'Data Owner Gagal Di Buat' . $th->getMessage());
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
