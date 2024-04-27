<?php

namespace Database\Seeders;

use App\Models\dinaspeternakan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class dinasPeternakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        dinaspeternakan::create([
            'nama' => 'Dinas Peternakan Jember',
            'id_pengguna' => 1,
        ]);
    }
}
