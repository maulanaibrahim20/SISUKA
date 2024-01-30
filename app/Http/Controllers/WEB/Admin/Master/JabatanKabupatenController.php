<?php

namespace App\Http\Controllers\WEB\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\JabatanKabupaten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
