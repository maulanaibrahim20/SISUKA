<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            Role::ADMIN_KAB,
            Role::ADMIN_KEC,
            Role::ADMIN_DES,
            Role::STAFF_KAB,
            Role::STAFF_KEC,
            Role::STAFF_DESA
        ];

        foreach ($roles as $role) {
            Role::create([
                'name' => $role,
            ]);
        }
    }
}
