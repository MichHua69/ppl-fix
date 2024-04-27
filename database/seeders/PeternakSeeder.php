<?php

namespace Database\Seeders;

use App\Models\peternak;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeternakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        peternak::create([
            'nama' => 'Peternak',
            'nik' => 350921603040005,
            'telepon' => '085103769420',
            'id_pengguna' => 3,
            'id_alamat' => 2,
        ]);
    }
}
