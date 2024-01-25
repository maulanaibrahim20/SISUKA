<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
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

        // $member = User::factory()->create([
        //     "email" => "client.app@mailinator.com"
        // ]);
        // $member->assignRole(Role::fingById(User::MEMBER));
    }
}
