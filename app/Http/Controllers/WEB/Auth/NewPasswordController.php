<?php

namespace App\Http\Controllers\WEB\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewPasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Auth\Events\PasswordReset;
use RealRashid\SweetAlert\Facades\Alert;

class NewPasswordController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index(Request $request)
    {
        if (!$request->has('token')) {
            return redirect(route('login.index'));
        }

        if (!$request->has('email')) {
            return redirect(route('login.index'));
        }

        return view('auth.reset-password.new-password');
    }

    public function process(NewPasswordRequest $request)
    {
        DB::beginTransaction();

        $user = $this->user->whereEmail($request->email)->first();
        if (!$user) {
            return redirect(route('login.index'))->with('Maaf Akun Anda Tidak Terdaftar!');
        }
        try {
            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($user, $password) {
                    $user->forceFill([
                        'password' => bcrypt($password),
                        'email_verified_at' => Carbon::now(),
                    ])->setRememberToken(Str::random(10));
                    $user->save();
                    event(new PasswordReset($user));
                }
            );

            DB::commit();
            if ($status == Password::PASSWORD_RESET) {
                Alert::succes('success', 'Selamat password anda berhasil diubah!');
                return redirect(route('login.index'))->with('Success', 'Selamat password anda berhasil diubah!');
            } else {
                Alert::error('success', 'Maaf token sudah kedaluwarsa, silahkan lakukan reset password!');
                return redirect(route('login.index'))->with('Error', 'Maaf token sudah kedaluwarsa, silahkan lakukan reset password!');
            }
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect(route('login.index'))->with('error' . $e->getMessage());
        }
    }
}
