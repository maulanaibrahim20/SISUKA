<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('admin.pages.dashboard.index');
    }

    public function admin_kecamatan()
    {
        return view('admin_kecamatan.pages.dashboard.index');
    }

    public function admin_desa()
    {
        return view('admin_desa.pages.dashboard.index');
    }
}
