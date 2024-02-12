<?php

namespace App\Http\Controllers\WEB\AdminDes\Master;

use App\Http\Controllers\Controller;
use App\Models\AdminDes\JabatanDesa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class JabatanDesaController extends Controller
{

    protected $jabatan;

    public function __construct(JabatanDesa $jabatan)
    {
        $this->jabatan = $jabatan;
    }
    public function index()
    {
        $jabatan = $this->jabatan::where('created_by', auth()->user()->name)->orderBy('created_at', 'desc')->get();
        return view('admin_desa.pages.master.jabatan.index', compact('jabatan'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $this->jabatan::create([
                'name' => $request->name,
                'created_by' => auth()->user()->name,
                'user_id' => auth()->user()->id,
            ]);

            DB::commit();
            Alert::success('Success', 'Data Berhasil Ditambahkan');
            return redirect()->back()->with('success', 'Berhasil menambahkan jabatan');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Error', 'Data Gagal Ditambahkan');
            return redirect()->back()->with('error', 'Gagal menambahkan jabatan');
        } catch (\Exception $e) {
            DB::rollBack();
            Alert::error('Error', 'Data Gagal Ditambahkan');
            return redirect()->back()->with('error', 'Gagal menambahkan jabatan');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $jabatan = $this->jabatan::findOrFail($id);
            $jabatan->update([
                'name' => $request->name,
                'updated_at' => Carbon::now(),
                'user_id' => auth()->user()->id,
            ]);

            DB::commit();

            Alert::success('Berhasil', 'Berhasil Mengupdate Jabatan');
            return back()->with('success', 'Berhasil Mengupdate Jabatan');
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Gagal', 'Gagal Update Jabatan' . $e->getMessage());
            return back()->with('error', 'Gagal Update Jabatan' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $jabatan = $this->jabatan::findOrFail($id);
            $jabatan->delete();

            DB::commit();

            Alert::success('Berhasil', 'Data Berhasil Dihapus');
            return back()->with('Success', 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Gagal', 'Data Gagal Dihapus' . $e->getMessage());
            return back()->with('error', 'Data Gagal Dihapus!' . $e->getMessage());
        }
    }
}
