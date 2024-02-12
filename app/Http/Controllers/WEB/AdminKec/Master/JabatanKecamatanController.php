<?php

namespace App\Http\Controllers\WEB\AdminKec\Master;

use App\Http\Controllers\Controller;
use App\Models\AdminKec\JabatanKecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class JabatanKecamatanController extends Controller
{

    protected $jabatan;

    public function __construct(JabatanKecamatan $jabatan)
    {
        $this->jabatan = $jabatan;
    }
    public function index()
    {
        $jabatan = $this->jabatan::where('created_by', auth()->user()->name)->orderBy('created_at', 'desc')->get();
        return view('admin_kecamatan.pages.master.jabatan.index', compact('jabatan'));
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
            return redirect()->back()->with('success', 'Berhasil menambahkan jabatan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menambahkan jabatan');
        }
    }

    public function update(Request $request, $id)
    {
        dd($request->all());
        try {
            $jabatan = $this->jabatan::findOrFail($id);
            $jabatan->update([
                'name' => $request->name,
                'updated_at' => Carbon::now(),
                'user_id' => auth()->user()->id,
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal Update Jabatan');
        }
    }
}
