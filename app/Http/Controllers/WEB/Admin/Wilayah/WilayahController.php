<?php

namespace App\Http\Controllers\WEB\Admin\Wilayah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class WilayahController extends Controller
{
    public function ambil_kecamatan(Request $request)
    {
        $id_kota_kab = $request->kota_kab;

        $res_kecamatan = Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/districts/" . $id_kota_kab . ".json");

        $kecamatan = $res_kecamatan->json();

        foreach ($kecamatan as $data) {
            echo "<option value='" . $data['id'] . "'>" . $data['name'] . "</option>";
        }
    }

    public function ambil_kelurahan(Request $request)
    {
        $id_kecamatan = $request->kecamatan;

        $res_kelurahan = Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/villages/" . $id_kecamatan . ".json");

        $kelurahan = $res_kelurahan->json();

        foreach ($kelurahan as $data) {
            echo "<option value='" . $data['id'] . "'>" . $data['name'] . "</option>";
        }
    }
}
