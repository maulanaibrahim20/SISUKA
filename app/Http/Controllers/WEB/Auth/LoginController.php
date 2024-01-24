<?php

namespace App\Http\Controllers\WEB\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return view('auth.login.login');
    }

    public function process(LoginRequest $request)
    {
        $user = $this->user->whereEmail($request->email)->first();
        if (!$user) {
            Alert::error('Maaf Akun Anda Tidak Terdaftar');
            return redirect(route('login.index'))->with('error', 'Maaf Akun Anda Tidak Terdaftar');
        }
        if (!Hash::check($request->password, $user->password)) {
            Alert::error('Maaf Pasword Anda Salah!');
            return back()->with('error', 'Maaf Password Anda Salah!');
        }
        if (!$user->email_verified_at) {
            alert::warning('Maaf Akun Anda Belum Terverifikasi');
            return back()->with('error', 'Maaf Akun Anda Belum Terverifikasi');
        }
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();

            if ($user->hasRole(Role::ADMIN_APP)) {
                return redirect('/admin/dashboard');
            } elseif ($user->hasRole(Role::MAKEUP_BOS)) {
                return redirect('/owner/dashboard');
            } elseif ($user->hasRole(Role::MEMBER)) {
                return redirect('/client/dashboard');
            }
        }
        return back()->with('error', 'Gagal melakukan autentikasi');
    }
}
