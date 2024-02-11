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
use Carbon\Carbon;

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
        $user->last_login = Carbon::now()->timezone('Asia/Jakarta');
        $user->save();

        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();
            if ($user->hasRole(Role::ADMIN_KAB)) {
                return redirect('/admin/kab/dashboard');
            } elseif ($user->hasRole(Role::STAFF_KAB)) {
                return redirect('/staff/kab/dashboard');
            } elseif ($user->hasRole(Role::ADMIN_KEC)) {
                return redirect('/admin/kec/dashboard');
            } elseif ($user->hasRole(Role::STAFF_KEC)) {
                return redirect('/staff/kec/dashboard');
            } elseif ($user->hasRole(Role::ADMIN_DES)) {
                return redirect('/admin/des/dashboard');
            } elseif ($user->hasRole(Role::STAFF_DESA)) {
                return redirect('/staff/des/dashboard');
            }
        }
        return back()->with('error', 'Gagal melakukan autentikasi');
    }
}
