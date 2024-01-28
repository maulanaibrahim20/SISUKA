<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\User\AdminDes;
use App\Models\User\AdminKec;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        $data = [
            'jumlah_admin_kecamatan' => AdminKec::count(),
            'jumlah_admin_desa' => AdminDes::count(),
        ];
        return view('admin.pages.dashboard.index', $data);
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
