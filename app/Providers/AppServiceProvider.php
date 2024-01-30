<?php

namespace App\Providers;

use App\Models\Admin\StaffKabupaten;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\User\AdminKec;
use App\Models\Kecamatan;
use App\Models\User\AdminDes;
use App\Models\Desa;
use App\Models\Master\JabatanKabupaten;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('admin.template.header', function ($view) {
            $adminKec = AdminKec::where('user_id', Auth::id())->first();
            $kecamatan = $adminKec ? $adminKec->kecamatan : '';
            $WilayahKec = Kecamatan::where('id', $kecamatan)->first();

            $adminDes = AdminDes::where('user_id', Auth::id())->first();
            $desa = $adminDes ? $adminDes->desa : '';
            $WilayahDesa = Desa::where('id', $desa)->first();


            $jabatanId = StaffKabupaten::where('user_id', Auth::id())->first();
            $jab = $jabatanId ? $jabatanId->jabatan->name : '';

            $view->with([
                'user' => Auth::user(),
                'adminKec' => $adminKec,
                'kecamatan' => $WilayahKec,
                'adminDes' => $adminDes,
                'desa' => $WilayahDesa,
                'jabatan' => $jab,
            ]);
        });
    }
}
