<?php

namespace Database\Seeders;

use App\Models\Master\JabatanKabupaten;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JabatanKabupaten::create([
            'name' => 'Sekretaris Daerah',
        ]);
    }
}
