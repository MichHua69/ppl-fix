<?php

namespace Database\Seeders;

use App\Models\dokterhewan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dokterData = [
            ['dokter', 2, 1],
            ['Dr. Adi Setiawan', 4, 2 ],
            ['Dr. Kurniadi Wahyu', 5, 1],
            ['Dr. Ahmad Nasir', 6, 2],
            ['Dr. Hasyim Bukhori', 7, 1],
            ['Dr. Steven Kurniawan', 8, 2],
            ['Dr. Kevin Mahendra', 9, 1],
            ['Dr. Uyee Washington', 10, 2],
        ];

        foreach ($dokterData as $data) {
            dokterhewan::create([
                'nama' => $data[0],
                'id_puskeswan' => $data[2],
                'id_pengguna' => $data[1],
            ]);
        }
    }
}
