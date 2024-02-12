<?php

namespace App\Http\Controllers\WEB\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\JabatanKabupaten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;


class JabatanKabupatenController extends Controller
{
    protected $jabatan;

    public function __construct(JabatanKabupaten $jabatan)
    {
        $this->jabatan = $jabatan;
    }
    public function index()
    {
        $jabatan = $this->jabatan::all();
        return view('admin.pages.master.jabatan.index', compact('jabatan'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $this->jabatan::create([
                'name' => $request->name,
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Berhasil menambahkan jabatan');
        } catch (\Throwable $th) {
            DB::rollBack();
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
            ]);

            DB::commit();

            Alert::success('success', 'Data Jabatan Berhasil Di update');
            return back()->with('success', 'Data Jabatan Berhasil Di update');
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('error', 'Data Gagal DiUpdate Terjadi Kesalahan' . $e->getMessage());
            return back()->with('error', 'Data Gagal Diupdate Terjadi Kesalahan');
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $jabatan = $this->jabatan::findOrFail($id);
            $jabatan->delete();
            DB::commit();

            Alert::success('success', 'Data Jabatan Berhasil DiHapus!');
            return back()->with('success', 'Data Jabatan Berhasil Dihapus');
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('error', 'Data Gagal DiUpdate Terjadi Kesalahan' . $e->getMessage());
            return back()->with('error', 'Data Gagal Diupdate Terjadi Kesalahan');
        }
    }
}
