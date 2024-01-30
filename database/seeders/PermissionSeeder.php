<?php

namespace Database\Seeders;

use App\Models\Permission\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        foreach (Permission::CRUD_ADMIN_KEC as $permissionName) {
            Permission::create([
                'name' => $permissionName,
            ]);
        }
    }
}
