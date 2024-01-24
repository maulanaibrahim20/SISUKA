<?php

namespace App\Http\Controllers\WEB\Auth;

use App\Http\Controllers\Controller;
use App\Http\Facades\SendMail;
use App\Http\Requests\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    protected  $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return view('auth.register.register');
    }

    public function register(RegisterRequest $request)
    {
        DB::beginTransaction();

        $request->merge([
            "password" => Hash::make($request->password),
        ]);

        try {
            $user = $this->user->create($request->all());
            $user->assignRole(Role::findById($this->user::MEMBER));

            SendMail::verification($user);

            DB::commit();

            Alert::success('Berhasil', 'Selamat akun anda berhasil disimpan. Silahkan periksa email anda untuk verifikasi!');
            return redirect(route('login.index'))->with('success', 'Selamat, akun Anda berhasil disimpan. Silahkan periksa email Anda untuk verifikasi!');
        } catch (\Throwable $e) {
            DB::rollback();
            alert::error('Gagal', 'Akun Anda Gagal Di daftarkan' . $e->getMessage());
            return back()->with('error', 'Gagal mendaftarkan akun Anda. ' . $e->getMessage());
        }
    }
}
