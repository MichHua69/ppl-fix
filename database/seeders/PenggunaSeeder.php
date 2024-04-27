<?php

namespace Database\Seeders;

use App\Models\pengguna;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penggunaData = [
            ['dinaspeternakan', 'dinaspeternakan@gmail.com', 'dinas123', 1], // [nama_pengguna, email, password, id_role]
            ['dokter', 'dokter@gmail.com', 'dokter123', 2],
            ['peternak', 'peternak@gmail.com', 'peternak123', 3],
            ['AdiSetiawan', 'adisetiawan@gmail.com', 'dokter123', 2],
            ['KurniadiWahyu', 'kurniadiwahyu@gmail.com', 'dokter123', 2],
            ['AhmadNasir', 'ahmadnasir@gmail.com', 'dokter123', 2],
            ['HasyimBukhori', 'hasyimbukhori@gmail.com', 'dokter123', 2],
            ['StevenKurniawan', 'stevenkurniawan@gmail.com', 'dokter123', 2],
            ['KevinMahendra', 'kevinmahendra@gmail.com', 'dokter123', 2],
            ['UyeeWashington', 'uyeewashington@gmail.com', 'dokter123', 2],
        ];

        foreach ($penggunaData as $data) {
            pengguna::create([
                'nama_pengguna' => $data[0],
                'email' => $data[1],
                'password' => bcrypt($data[2]),
                'id_role' => $data[3],
            ]);
        }
    }
}
