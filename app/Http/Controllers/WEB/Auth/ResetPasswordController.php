<?php

namespace App\Http\Controllers\WEB\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;

class ResetPasswordController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return view('auth.reset-password.reset-password');
    }

    public function process(ResetPasswordRequest $request)
    {
        // dd($request->all());
        $user = $this->user->whereEmail($request->email)->first();
        if (!$user) {
            alert::warning('error', 'Akun Tidak Ditemukan');
            return redirect(route('reset-password.index'))->with('error', 'akun tidak ditemukan');
        }

        $status = Password::sendResetLink($request->only('email'));

        if ($status == Password::RESET_LINK_SENT) {
            Alert::success('Success', "link reset password telah dikirim ke email anda");
            return redirect(route('reset-password.index'))->with('success', 'link reset password telah dikirim ke email anda');
        }

        throw ValidationException::withMessages([
            'email' => [trans($status)]
        ]);
    }
}
