<?php

namespace Database\Seeders;

use App\Models\kecamatan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Ajung',
            'Ambulu',
            'Arjasa',
            'Bangsalsari',
            'Balung',
            'Gumukmas',
            'Jelbuk',
            'Jenggawah',
            'Jombang',
            'Kalisat',
            'Kaliwates',
            'Kencong',
            'Ledokombo',
            'Mayang',
            'Mumbulsari',
            'Panti',
            'Pakusari',
            'Patrang',
            'Puger',
            'Rambipuji',
            'Semboro',
            'Silo',
            'Sukorambi',
            'Sukowono',
            'Sumberbaru',
            'Sumberjambe',
            'Sumbersari',
            'Tanggul',
            'Tempurejo',
            'Umbulsari',
            'Wuluhan',
        ];

        // Buat entri untuk setiap kecamatan
        foreach ($data as $kecamatan) {
            kecamatan::create([
                'kecamatan' => $kecamatan,
            ]);
        }
    }
}
