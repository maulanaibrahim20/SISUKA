<?php

namespace Database\Seeders;

use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Role;
use App\Models\User;
use App\Models\User\AdminDes;
use App\Models\User\AdminKec;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminApp = User::factory()->create([
            "email" => "admin.kab@mailinator.com"
        ]);
        $adminApp->assignRole(Role::findById(User::ADMIN_KAB));


        $makeupBos = User::factory()->create([
            "email" => "admin.kec@mailinator.com"
        ]);
        $makeupBos->assignRole(Role::findById(User::ADMIN_KEC));
        $kecamatanId = Kecamatan::inRandomOrder()->pluck('id')->first();
        AdminKec::create([
            'user_id' => $makeupBos->id,
            'kecamatan' => $kecamatanId
        ]);


        $member = User::factory()->create([
            "email" => "admin.des@mailinator.com"
        ]);
        $member->assignRole(Role::findById(User::ADMIN_DES));
        $desaId = Desa::where('district_id', $kecamatanId)->inRandomOrder()->pluck('id')->first();
        AdminDes::create([
            'user_id' => $member->id,
            'desa' => $desaId,
            'user_kecamatan' => $makeupBos->id
        ]);
    }
}
