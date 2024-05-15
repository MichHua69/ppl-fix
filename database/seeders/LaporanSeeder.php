<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\laporan;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['Laporan Penyakit A001','<div><strong>1. Identifikasi Sapi<br></strong><br></div><ul><li><strong>ID Sapi:</strong> 001</li><li><strong>Nama Sapi:</strong> Bintang</li><li><strong>Jenis Kelamin:</strong> Betina</li><li><strong>Umur:</strong> 3 tahun</li><li><strong>Jenis Ras:</strong> Sapi Bali</li></ul><div><strong><br>2. Kondisi Umum<br></strong><br></div><ul><li><strong>Berat Badan:</strong> 450 kg</li><li><strong>Suhu Tubuh:</strong> 38.5°C</li><li><strong>Detak Jantung:</strong> 70 bpm</li><li><strong>Frekuensi Nafas:</strong> 25 per menit</li><li><strong>Kondisi Fisik:</strong> Aktif, bulu bersih dan mengkilap</li></ul><div><strong><br>3. Riwayat Kesehatan<br></strong><br></div><ul><li><strong><br>Vaksinasi:<br></strong><br><ul><li><strong>Antraks:</strong> 12 Januari 2024</li><li><strong>IBR:</strong> 15 Februari 2024</li><li><strong>BVD:</strong> 20 Maret 2024</li></ul></li><li><strong><br>Pemeriksaan Sebelumnya:<br></strong><br><ul><li>10 April 2024: Pemeriksaan rutin, kondisi sehat</li></ul></li></ul><div><strong><br>4. Pemeriksaan Saat Ini<br></strong><br></div><ul><li><strong>Mata:</strong> Jernih, tidak ada tanda-tanda infeksi</li><li><strong>Telinga:</strong> Bersih, tidak ada kotoran berlebihan</li><li><strong>Mulut:</strong> Gusi berwarna merah muda, tidak ada luka atau sariawan</li><li><strong>Hidung:</strong> Tidak ada cairan berlebihan, nafas normal</li><li><strong>Kulit dan Bulu:</strong> Tidak ada luka atau tanda-tanda parasit, bulu mengkilap</li><li><strong>Kaki dan Kuku:</strong> Tidak ada luka, kuku dalam kondisi baik</li></ul><div><strong><br>5. Diagnosis<br></strong><br></div><ul><li><strong>Kondisi Umum:</strong> Sehat, tidak ditemukan tanda-tanda penyakit</li><li><strong>Catatan Khusus:</strong> Tidak ada</li></ul><div><strong><br>6. Rekomendasi<br></strong><br></div><ul><li><strong>Nutrisi:</strong> Pastikan sapi mendapatkan pakan yang cukup dan berkualitas, termasuk tambahan mineral dan vitamin.</li><li><strong>Kebersihan:</strong> Lanjutkan menjaga kebersihan kandang dan area sekitar untuk mencegah infeksi.</li><li><strong>Pemeriksaan Rutin:</strong> Lakukan pemeriksaan kesehatan setiap bulan untuk memantau kondisi sapi.</li><li><strong>Vaksinasi:</strong> Ikuti jadwal vaksinasi berikutnya pada bulan Juli 2024.</li></ul><div><strong><br>7. Tindakan Selanjutnya<br></strong><br></div><ul><li><strong>Pemantauan:</strong> Pantau berat badan dan kondisi fisik setiap minggu.</li><li><strong>Pemberian Vitamin:</strong> Berikan suplemen vitamin setiap dua minggu untuk menjaga kesehatan optimal.</li></ul>',3,2]
        ];

        foreach ($data as $data) {
            laporan::create([
                'judul_laporan' => $data[0],
                'isi_laporan' => $data[1],
                'id_peternak' => $data[2],
                'id_dokter' => $data[3],
            ]);
        }
    }
}
