<?php

namespace App\Http\Controllers\WEB\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class VerificationController extends Controller
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function __invoke(Request $request)
    {
        DB::beginTransaction();

        $user = $this->user->whereEmail($request->email)->first();
        if (!$user) {
            Alert::error("Maaf Akun anda tidak terdaftar");
            return redirect(route('login.index'));
        }

        $request->merge([
            "password" => ""
        ]);

        try {
            $status = Password::reset(
                $request->only('email', 'token', 'password'),
                function ($user, $password) {
                    $user->forceFill([
                        'email_verified_at' => Carbon::now()
                    ])->setRememberToken(Str::random(10));

                    $user->save();

                    event(new PasswordReset($user));
                }
            );

            DB::commit();
            if ($status == Password::PASSWORD_RESET) {
                Alert::success("Selamat Akun Anda Berhasil di verifikasi");
                return redirect(route('login.index'));
            } else {
                alert::warning('Token Kadaluarsa', 'Maaf token anda kedalaursa');
                return redirect(route('login.index'));
            }
        } catch (\Throwable $e) {
            DB::rollback();
            alert::error('Terjadi Kesalahan' . $e->getMessage());
            return redirect(route('login.index'));
        }
    }
}
