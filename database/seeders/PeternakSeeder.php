<?php

namespace Database\Seeders;

use App\Models\pengguna;
use App\Models\peternak;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PeternakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $data = [
            ['Peternak', 350921603040005, '085103769420', 3 , 2],
            ['Joko Susilo', 319051104024001, '081234567891', 11 , 6],
            ['Budi Santoso', 175101105162002, '081234567892', 12 , 7],
            ['Siti Rahayu', 238061105211003, '081234567893', 13 , 8],
            ['Rina Wulandari', 447101102020004, '081234567894', 14 , 9],
            ['Dewi Lestari', 569031102012005, '081234567895', 15 , 10],
            ['Eko Prasetyo', 678021103039006, '081234567896', 16 , 11],
            ['AniRahayu', 793010801290007, '081234567897', 17 , 12],
        ];

        foreach ($data as $data) {
            peternak::create([
                'nama' => $data[0],
                'nik' => $data[1],
                'telepon' => bcrypt($data[2]),
                'id_pengguna' => $data[3],
                'id_alamat' => $data[4],
            ]);
        }
    }
}
