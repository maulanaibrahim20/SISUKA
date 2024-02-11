<?php

namespace App\Http\Controllers\WEB\StaffKab\Persuratan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    public function index()
    {
        return view('staff_kab.pages.persuratan.surat_masuk.index');
    }

    public function create()
    {
        return view('staff_kab.pages.persuratan.surat_masuk.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
