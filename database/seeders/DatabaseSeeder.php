<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\Wilayah\DesaSeeder;
use Database\Seeders\Wilayah\KecamatanSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([

            KecamatanSeeder::class,
            DesaSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            JabatanSeeder::class,
        ]);
    }
}
