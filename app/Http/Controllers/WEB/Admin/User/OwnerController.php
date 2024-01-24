<?php

namespace App\Http\Controllers\WEB\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Facades\SendMail;
use App\Http\Requests\User\Owner\CreateRequest;
use App\Http\Requests\User\Owner\UpdateRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\User\Owner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class OwnerController extends Controller
{
    protected $owner;

    protected $user;

    protected $wilayah = "https://emsifa.github.io/api-wilayah-indonesia/api/";




    public function __construct(Owner $owner, User $user)
    {
        $this->owner = $owner;
        $this->user = $user;
    }
    public function index()
    {
        $page_active = 'Create Owner Table';
        $title = 'Table Owner';
        $user = $this->owner::all();
        $kota_kab = $this->owner->first();
        $response = Http::get($this->wilayah . "districts/" . $kota_kab->kota_kab . ".json");
        $wilayahData = $response->json();

        // dd($wilayahData);


        return view('admin.pages.user.owner.index', compact('title', 'user', 'page_active', 'wilayahData'));
    }

    public function create()
    {
        $data = [
            'title' => 'Create Owner',
            'page_nonActive' => 'Owner',
            'page_active' => 'Add Create Owner',
        ];

        $response = Http::get($this->wilayah . "regencies/32.json");
        $kota_kab = $response->json();
        return view('admin.pages.user.owner.create', $data, compact('kota_kab'));
    }

    public function store(CreateRequest $request)
    {
        try {
            DB::beginTransaction();

            $user = $this->user->create($request->all() + [
                'password' => Hash::make($request->password),
            ]);

            $user->setFillableAttributes();
            $user->email_verified_at = Carbon::now();
            $user->remember_token = Str::random(10);
            $user->save();

            $user->assignRole(Role::findById($this->user::MAKEUP_BOS));

            $this->owner->create($request->all() + [
                'id_owner' => 'OW-' . date('YmdHis'),
                'user_id' => $user->id,
            ]);

            DB::commit();
            Alert::success('Success', 'Success Create Owner');
            return redirect('/admin/create/owner')->with('Data Owner Berhasil Di Buat');
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($e->errors());
        } catch (ValidationException $th) {
            DB::rollBack();
            Alert::error('Error', $th->getMessage());
            return redirect()->back()->with('error', 'Data Owner Gagal Di Buat' . $th->getMessage());
        }
    }

    public function edit($id_owner)
    {
        $data = [
            'title' => 'Edit Owner',
            'page_nonActive' => 'Owner',
            'page_active' => 'Edit Owner',
        ];
        $user = $this->owner->findOrFail($id_owner);
        return view('admin.pages.user.owner.update', compact('data', 'user'));
    }

    public function update(UpdateRequest $request, $id_owner)
    {
        try {
            DB::beginTransaction();

            $user = $this->owner->findOrFail($id_owner);
            $user->update([
                'nama_perusahaan' => $request->nama_perusahaan,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'jk' => $request->jk,
            ]);

            $user->user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password ? Hash::make($request->password) : $user->user->password,
            ]);

            DB::commit();

            Alert::success('Succses', 'Akun Owner Berhasil Diubah');
            return redirect('/admin/create/owner')->with('success', 'Owner updated successfully');
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($e->errors());
        } catch (\Exception $th) {
            DB::rollback();
            Alert::error('Error', 'Akun Owner Gagal Diubah' . $th->getMessage());
            return redirect()->back()->with('error', 'Owner updated failed' . $th->getMessage());
        }
    }

    public function destroy($id_owner)
    {
        try {
            DB::beginTransaction();

            $user = $this->owner->findOrFail($id_owner);
            $user->user->delete();
            $user->delete();

            DB::commit();

            Alert::success('Succses', 'Akun Client Berhasil Dihapus');
            return redirect('/admin/create/owner')->with('success', 'Owner deleted successfully');
        } catch (\Exception $th) {
            DB::rollback();
            Alert::error('Error', 'Akun Client Gagal Dihapus' . $th->getMessage());
            return redirect()->back()->with('error', 'Owner deleted failed' . $th->getMessage());
        }
    }
}
