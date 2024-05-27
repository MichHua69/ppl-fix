<?php

namespace Database\Seeders;

use App\Models\Pengguna;
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
            ['dinaspeternakan', 'dinaspeternakan@gmail.com', 'dinas123', 1, 'dinaspeternakan.jpg'], // [nama_pengguna, email, password, id_role]
            ['dokter', 'dokter@gmail.com', 'dokter123', 2, 'dokter.png'],
            ['peternak', 'peternak@gmail.com', 'peternak123', 3 , 'peternak.png'],
            ['AdiSetiawan', 'adisetiawan@gmail.com', 'dokter123', 2 , null],
            ['KurniadiWahyu', 'kurniadiwahyu@gmail.com', 'dokter123', 2 , null],
            ['AhmadNasir', 'ahmadnasir@gmail.com', 'dokter123', 2 , null],
            ['HasyimBukhori', 'hasyimbukhori@gmail.com', 'dokter123', 2 , null],
            ['StevenKurniawan', 'stevenkurniawan@gmail.com', 'dokter123', 2 , null],
            ['KevinMahendra', 'kevinmahendra@gmail.com', 'dokter123', 2 , null],
            ['UyeeWashington', 'uyeewashington@gmail.com', 'dokter123', 2 , null],
            ['JokoSusilo', 'jokosusilo@gmail.com', 'peternak123', 3 , null],
            ['BudiSantoso', 'budisantoso@gmail.com', 'peternak123', 3 , null],
            ['SitiRahayu', 'sitirahayu@gmail.com', 'peternak123', 3 , null],
            ['RinaWulandari', 'rinawulandari@gmail.com', 'peternak123', 3 , null],
            ['DewiLestari', 'dewilestari@gmail.com', 'peternak123', 3 , null],
            ['EkoPrasetyo', 'ekoprasetyo@gmail.com', 'peternak123', 3 , null],
            ['AniRahayu', 'anirahayu@gmail.com', 'peternak123', 3 , null],
        ];

        foreach ($penggunaData as $data) {
            Pengguna::create([
                'nama_pengguna' => $data[0],
                'email' => $data[1],
                'password' => bcrypt($data[2]),
                'id_role' => $data[3],
                'avatar' => $data[4],
            ]);
        }
    }
}
