<?php

namespace Database\Seeders;

use App\Models\alamat;
use App\Models\Wilayah;
use Illuminate\Database\Seeder;

class AlamatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['Jalan Pahlawan', 'Bangsalsari', 'Bangsalsari'],
            ['Jalan Pemuda', 'Kaliwates', 'Kaliwates'],
            ['Jalan Raya', 'Jelbuk', 'Jelbuk'],
            ['Jalan Merdeka', 'Sumberjambe', 'Sumberjambe'],
            ['Jalan Kartini', 'Patrang', 'Patrang'],
            ['Jalan Mangga', 'Bangsalsari', 'Badean'],
            ['Jalan Anggrek', 'Jelbuk', 'Sukojember'],
            ['Jalan Mawar', 'Ambulu', 'Sumberejo'],
            ['Jalan Melati', 'Sukowono', 'Sukorejo'],
            ['Jalan Kamboja', 'Puger', 'Puger Kulon'],
            ['Jalan Dahlia', 'Jenggawah', 'Sruni'],
            ['Jalan Sakura', 'Ajung', 'Mangaran'],
        ];

        foreach ($data as $row) {
            // Ambil data dari inputan
            $jalan = $row[0];
            $kecamatan = $row[1];
            $desa = $row[2];

            // Cari wilayah berdasarkan kecamatan dan desa
            $wilayah = Wilayah::whereHas('kecamatan', function ($query) use ($kecamatan) {
                $query->where('kecamatan', $kecamatan);
            })->whereHas('desa', function ($query) use ($desa) {
                $query->where('desa', $desa);
            })->first();

            // Jika wilayah tidak ditemukan, lewati entri ini
            if (!$wilayah) {
                continue;
            }

            // Buat entri alamat
            alamat::create([
                'jalan' => $jalan,
                'id_wilayah' => $wilayah->id,
            ]);
        }
    }
}
