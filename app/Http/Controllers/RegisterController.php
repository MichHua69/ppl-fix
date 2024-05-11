<?php

namespace App\Http\Controllers;

use App\Models\desa;
use App\Models\alamat;
use App\Models\wilayah;
use App\Models\pengguna;
use App\Models\peternak;
use App\Models\kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        $kecamatan = kecamatan::all();
        $desa = desa::all();

        return view('register', compact('kecamatan', 'desa'));
    }
    public function getDesaByKecamatan(Request $request) {
        $desa = Wilayah::where('id_kecamatan', $request->id_kecamatan)->pluck('id_desa');
        $desaNames = Desa::whereIn('id', $desa)->pluck('desa');

        return response()->json($desaNames);
    }


    public function store(Request $request) {
        // Validation
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kecamatan' => 'required',
            'desa' => 'required',
            'dusun' => 'required|string',
            'nik' => 'required|string|min:16|max:16|unique:peternak',
            'telepon' => 'required|string|max:20|unique:peternak',
            'nama_pengguna' => 'required|string|max:255|unique:pengguna',
            'email' => 'required|string|email|max:255|unique:pengguna',
            'password' => 'required|string|min:5|confirmed'],

            [
                'nama' => [ 'required' => 'Nama wajib diisi.', 'string' => 'Nama harus berupa string.', 'max' => 'Nama maksimal : 255 karakter.', ],

                'alamat' => [ 'required' => 'Alamat wajib diisi.', 'string' => 'Alamat harus berupa string.', 'max' => 'Alamat maksimal : 255 karakter.', ],

                'kecamatan' => [ 'required' => 'Kecamatan wajib diisi.', 'string' => 'Kecamatan harus berupa string.', ],

                'desa' => [ 'required' => 'Desa wajib diisi.', 'string' => 'Desa harus berupa string.', ],

                'dusun' => [ 'required' => 'Dusun wajib diisi.', 'string' => 'Dusun harus berupa string.', ],

                'nik' => [ 'required' => 'NIK wajib diisi.', 'string' => 'NIK harus berupa string.', 'min' => 'NIK harus 16 digit.', 'max' => 'NIK harus 16 digit.', 'unique' => 'NIK sudah terdaftar.', ],

                'telepon' => [ 'required' => 'No. Telepon wajib diisi.', 'string' => 'No. Telepon harus berupa string.', 'max' => 'No. Telepon maksimal : 20 karakter.', 'unique' => 'No. Telepon sudah terdaftar.', ],

                'nama_pengguna' => [ 'required' => 'Nama Pengguna wajib diisi.', 'string' => 'Nama Pengguna harus berupa string.', 'max' => 'Nama Pengguna maksimal : 255 karakter.', 'unique' => 'Nama Pengguna sudah terdaftar.', ],

                'email' => [ 'required' => 'Email wajib diisi.', 'string' => 'Email harus berupa string.', 'email' => 'Email harus berupa alamat email yang valid.', 'max' => 'Email maksimal : 255 karakter.', 'unique' => 'Email sudah terdaftar.', ],

                'password' => [ 'required' => 'Kata Sandi wajib diisi.', 'string' => 'Kata Sandi harus berupa string.', 'min' => 'Kata Sandi minimal 5 karakter.', 'confirmed' => 'Konfirmasi Kata Sandi tidak sesuai.'],

                'billing_same' => 'accepted',
        ]);

        // // Create Wilayah
        // $wilayah = wilayah::create([
        //     'id_kecamatan' => $request->kecamatan,
        //     'id_desa' => $request->desa,

        // ]);
        // Create Alamat
        $id_kecamatan = $request->input('kecamatan');
        $id_desa = $request->input('desa');

        // Cari data wilayah berdasarkan id_kecamatan dan id_desa dari request
        $wilayah = wilayah::where('id_kecamatan', intval($id_kecamatan))
                        ->orWhere('id_desa', intval($id_desa))
                        ->first();

        $alamat = alamat::create([
            'jalan' => $request->alamat,
            'id_wilayah' => $wilayah->id,
            'dusun' => $request->dusun,
        ]);
        // Create Pengguna
        $pengguna = pengguna::create([
            'nama_pengguna' => $request->nama_pengguna,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_role' => 3,
        ]);

        // Create Peternak
        peternak::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'telepon' => $request->telepon,
            'id_alamat' => $alamat->id,
            'id_pengguna' => $pengguna->id,
        ]);

        // Redirect to login page
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login. ');
    }
}