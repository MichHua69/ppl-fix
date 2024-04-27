<?php

namespace Database\Seeders;

use App\Models\puskeswan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PuskeswanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $puskeswanData = [
            ['Balung', '085259878734', 1],
            ['Ambulu', '082334389199', 2],
        ];

        foreach ($puskeswanData as $data) {
            puskeswan::create([
                'puskeswan' => $data[0],
                'telepon' => $data[1],
                'id_alamat' => $data[2],
            ]);
        }
    }
}
