<?php

namespace App\Http\Controllers\WEB\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Client\CreateRequest;
use App\Http\Requests\User\Client\UpdateRequest;
use App\Models\Customer;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Facades\SendMail;
use Illuminate\Validation\ValidationException;

class ClientController extends Controller
{
    protected $user;

    protected $customer;

    public function __construct(User $user, Customer $customer)
    {
        $this->user = $user;
        $this->customer = $customer;
    }

    public function index()
    {
        $user = $this->customer::all();
        $title = 'Table Client';
        return view('admin.pages.user.client.index', compact('user', 'title'));
    }

    public function create()
    {
        $data = [
            'title' => 'Create Client ',
            'page_nonActive' => 'Client',
            'page_active' => 'Add Create Client',
        ];
        return view('admin.pages.user.client.create', $data);
    }

    public function store(CreateRequest $request)
    {
        try {
            DB::beginTransaction();

            $user = $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user->assignRole(Role::findById($this->user::MEMBER));
            SendMail::verification($user);

            $this->customer->create([
                'id_customer' => 'CUST-' . date('YmdHis'),
                'user_id' => $user->id,
                'pekerjaan' => $request->pekerjaan,
                'jk' => $request->jk,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
            ]);

            DB::commit();

            Alert::success('Succses', 'Akun Client Berhasil Dibuat Silahkan Cek Email Anda Untuk Verifikasi Akun');
            return redirect('/admin/create/client')->with('success', 'Client created successfully');
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($e->errors());
        } catch (\Exception $th) {
            DB::rollback();
            Alert::error('Error', 'Akun Client Gagal Dibuat' . $th->getMessage());
            return redirect()->back()->with('error', 'Client created failed' . $th->getMessage());
        }
    }

    public function edit($id)
    {
        $user = $this->customer::findOrFail($id);
        $data = [
            'title' => 'Edit Client ' . $user->user->name,
            'page_list' => 'Edit Client',
            'page_active' => 'Edit Client',
        ];
        return view('admin.pages.user.client.update', compact('user', 'data'));
    }

    public function show($id)
    {
    }

    public function update(UpdateRequest $request, $id_customer)
    {
        try {
            DB::beginTransaction();

            $user = $this->customer::findOrFail($id_customer);
            $user->user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password ? Hash::make($request->password) : $user->user->password,
            ]);

            $user->update([
                'pekerjaan' => $request->pekerjaan,
                'jk' => $request->jk,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
            ]);

            DB::commit();

            Alert::success('Succses', 'Akun Client Berhasil Diupdate');
            return redirect('/admin/create/client')->with('success', 'Client updated successfully');
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($e->errors());
        } catch (\Exception $th) {
            DB::rollback();
            Alert::error('Error', 'Akun Client Gagal Diupdate' . $th->getMessage());
            return redirect()->back()->with('error', 'Client updated failed' . $th->getMessage());
        }
    }

    public function destroy($id_customer)
    {
        try {
            DB::beginTransaction();

            $user = $this->customer::findOrFail($id_customer);
            $user->user->delete();
            $user->delete();

            DB::commit();

            Alert::success('Succses', 'Akun Client Berhasil Dihapus');
            return redirect('/admin/create/client')->with('success', 'Client deleted successfully');
        } catch (\Exception $th) {
            DB::rollback();
            Alert::error('Error', 'Akun Client Gagal Dihapus' . $th->getMessage());
            return redirect()->back()->with('error', 'Client deleted failed' . $th->getMessage());
        }
    }
}
