<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\User;
use App\Models\User\AdminDes;
use App\Models\User\AdminKec;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function admin()
    {
        $jumlah_admin_kecamatan = AdminKec::count();
        $jumlah_admin_desa = AdminDes::count();

        $users = User::all();

        $kecamatanData = [];
        $desaData = [];

        foreach ($users as $user) {
            if ($user->adminKec) {
                $kecamatan = Kecamatan::find($user->adminKec->kecamatan);
                $kecamatanData[$user->id] = $kecamatan ? $kecamatan->name : 'Belum memiliki data kecamatan';
            } else {
                $kecamatanData[$user->id] = 'Indramayu';
            }

            if ($user->adminDes) {
                $desa = Desa::find($user->adminDes->desa);
                $desaData[$user->id] = $desa ? $desa->name : 'Belum memiliki data desa';
            } else {
                $desaData[$user->id] = 'Belum memiliki data desa';
            }
        }

        return view('admin.pages.dashboard.index', [
            'jumlah_admin_kecamatan' => $jumlah_admin_kecamatan,
            'jumlah_admin_desa' => $jumlah_admin_desa,
            'users' => $users,
            'kecamatanData' => $kecamatanData,
            'desaData' => $desaData,
        ]);
    }
    public function staff_kab()
    {
        return view('staff_kab.pages.dashboard.index');
    }


    public function admin_kecamatan()
    {
        return view('admin_kecamatan.pages.dashboard.index');
    }

    public function staff_kecamatan()
    {
        return view('staff_kec.pages.dashboard.index');
    }

    public function admin_desa()
    {
        return view('admin_desa.pages.dashboard.index');
    }

    public function staff_desa()
    {
        return view('staff_desa.pages.dashboard.index');
    }
}
