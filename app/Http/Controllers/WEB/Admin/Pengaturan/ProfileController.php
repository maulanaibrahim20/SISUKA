<?php

namespace App\Http\Controllers\WEB\Admin\Pengaturan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pengaturan\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return view('admin.pages.pengaturan.profile');
    }

    public function edit()
    {
        $userId = Auth::user()->id;
        $profile = $this->user->find($userId);
        return view('admin.pages.pengaturan.edit_profile', compact('profile'));
    }

    public function update_profile(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $profile = $this->user->find($id);
            $profile->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            DB::commit();

            Alert::success('Success', 'Data Berhasil Diubah');
            return redirect('/admin/kab/profile')->with('success', 'Berhasil mengubah data profile');
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Gagal', 'Data Gagal Diupdate' . $th->getMessage());
            return back()->with('error', 'Gagal mengubah data profile' . $th->getMessage());
        }
    }

    public function update_password(UpdatePasswordRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $profile = $this->user->find($id);

            if (!Hash::check($request->current_password, $profile->password)) {
                DB::rollback();
                Alert::error('Gagal', 'Password lama tidak cocok.');
                return back();
            }
            $profile->update([
                'password' => Hash::make($request->new_password),
            ]);

            DB::commit();

            Session::flash('success', 'Password berhasil diubah');
            return redirect('/admin/kab/profile')->with('success', 'Berhasil mengubah password');
        } catch (\Throwable $th) {
            DB::rollback();
            Session::flash('error', 'Gagal mengubah password: ' . $th->getMessage());
            return back()->with('error', 'Gagal mengubah password');
        }
    }
}
