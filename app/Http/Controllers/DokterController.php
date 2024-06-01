<?php

namespace App\Http\Controllers;

use App\Models\desa;
use App\Models\artikel;
use App\Models\laporan;
use App\Models\program;
use App\Models\wilayah;
use App\Models\Pengguna;
use App\Models\peternak;
use App\Models\kecamatan;
use App\Models\puskeswan;
use App\Models\percakapan;
use App\Models\dokterhewan;
use Illuminate\Http\Request;
use App\Models\jadwalprogram;
use App\Models\dinaspeternakan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DokterController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $photo = $user->avatar ? 'profil/'.$user->avatar : '/images/defaultprofile.png';
        $title = 'Dashboard';
        return view('dokter.dashboard', compact('user','photo', 'title'));
    }

    public function profil() {
        $user = Auth::user();
        $aktor = dokterhewan::with('pengguna','puskeswan')->where('id_pengguna', $user->id)->first();
        $kecamatan = kecamatan::all();
        $desa = desa::all();


        $photo = $user->avatar ? 'profil/'.$user->avatar : '/images/defaultprofile.png';

        $title = 'Profil';
        return view('dokter.profil',compact('user','aktor','photo','kecamatan','desa', 'title'));
    }

    public function saveprofil(Request $request) {
        $user = Auth::user();

        $aktor = dokterhewan::with('pengguna', 'alamat.wilayah.kecamatan', 'alamat.wilayah.desa')->where('id_pengguna', $user->id)->first();

        $validator = Validator::make($request->all(),[
            'nama_pengguna' => 'required|string|max:255|unique:pengguna,nama_pengguna,'.$user->id,
            'password' => 'required|string|min:5',
            'file_input' => 'image'
            ],

            [
                'nama_pengguna' => [ 'required' => 'Nama Pengguna wajib diisi.', 'string' => 'Nama Pengguna harus berupa string.', 'max' => 'Nama Pengguna maksimal : 255 karakter.', 'unique' => 'Nama Pengguna sudah terdaftar.', ],

                'password' => [ 'required' => 'Kata Sandi wajib diisi.', 'string' => 'Kata Sandi harus berupa string.', 'min' => 'Kata Sandi minimal 5 karakter.', 'confirmed' => 'Konfirmasi Kata Sandi tidak sesuai.'],

                'file_input' => ['image' => 'File harus berupa gambar.'],
                'billing_same' => 'accepted',
            ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        // Handle avatar upload

        $aktor->pengguna->nama_pengguna = $request->nama_pengguna;
        $aktor->pengguna->password = Hash::make($request->password);
        $aktor->pengguna->save();

        $avatar = $aktor->pengguna->avatar;
        if ($avatar) {
            $extension = pathinfo($avatar)['extension'];
            $newAvatarName = $aktor->pengguna->nama_pengguna.'.'.$extension;

            // Simpan file avatar baru dengan nama baru
            $oldAvatarPath = public_path('profil').'/'.$avatar;
            $newAvatarPath = public_path('profil').'/'.$newAvatarName;

            // Rename file dengan menggunakan fungsi PHP rename
            rename($oldAvatarPath, $newAvatarPath);

            // Simpan nama file avatar baru ke dalam database
            $aktor->pengguna->avatar = $newAvatarName;
            $aktor->pengguna->save();
        }

        // Handle avatar upload
        if ($request->hasFile('file_input')) {
            $avatar = $request->file('file_input');
            $avatarName = $aktor->pengguna->nama_pengguna.'.'.$avatar->getClientOriginalExtension();

            // Simpan file avatar baru
            $avatar->move(public_path('profil'), $avatarName);

            // Hapus file avatar lama jika ada
            if ($avatar) {
                $oldAvatarPath = public_path('profil').'/'.$avatar;
                if (file_exists($oldAvatarPath)) {
                    unlink($oldAvatarPath);
                }
            }

            // Simpan nama avatar ke dalam database jika belum ada
            $aktor->pengguna->avatar = $avatarName;
            $aktor->pengguna->save();
        }
        return redirect()->back()->with('success', 'Perubahan Berhasil Disimpan.');
    }

    public function konsultasi(Request $request)
{
    // Mendapatkan pengguna yang sedang masuk
    $user = Auth::user();

    // Mengambil data dokter hewan yang terkait dengan pengguna
    $aktor = Dokterhewan::with('pengguna', 'alamat')->where('id_pengguna', $user->id)->first();

    // Mendapatkan daftar pengguna yang terkait dengan kolom "users" dalam tabel percakapan
    $relatedUsers = Percakapan::pluck('users')
        ->unique()
        ->map(function ($item) use ($user) {
            // Memisahkan entri berdasarkan tanda titik dua (:)
            $ids = explode(':', $item);
            // Memeriksa apakah $user->id ada dalam entri
            return in_array($user->id, $ids) ? $ids : null;
        })
        ->filter() // Menghapus entri yang tidak sesuai
        ->flatten()
        ->unique();

    // Mengambil daftar teman yang memiliki id_role 3 dan terkait dengan percakapan, kecuali pengguna yang sedang masuk
    $friendsWithId = Pengguna::where('id_role', 3)
        ->whereIn('id', $relatedUsers)
        ->whereNot('id', $user->id)
        ->get();

    // Menentukan foto profil pengguna, default ke 'defaultprofile.png' jika tidak ada avatar
    $photo = $user->avatar ? 'profil/'.$user->avatar : '/images/defaultprofile.png';

    // Menentukan judul halaman
    $title = 'Konsultasi';

    // Mengirim data ke tampilan 'dokter.konsultasi'
    return view('dokter.konsultasi', compact('user', 'friendsWithId', 'aktor', 'photo', 'title'));
}


    public function informasiprogram(){
        $user = Auth::user();
        $photo = $user->avatar ? 'profil/'.$user->avatar : '/images/defaultprofile.png';

        // Mengambil 4 artikel terbaru dari model Artikel
        $latestArticles = Artikel::latest()->take(4)->get();
        $latestProgram = program::latest()->take(4)->get();


        $title = 'Informasi Program';
        return view('dokter.informasiprogram', compact('user', 'photo', 'latestArticles','latestProgram', 'title'));
    }


    public function tambahartikel() {
        $user = Auth::user();
        $photo = $user->avatar ? 'profil/'.$user->avatar : '/images/defaultprofile.png';
        $title = 'Tambah Artikel';
        return view('dokter.tambahartikel' , compact('user','photo', 'title'));
    }

    public function storetambahartikel(Request $request) {

        $request->validate([
            'judul' => 'required|max:255',
            'gambar' => 'image', // Hapus validasi mimes untuk memperbolehkan semua jenis gambar
            'isi' => 'required'
        ], [
            'judul.required' => 'Judul Artikel wajib diisi',
            'judul.max' => 'Judul Artikel tidak boleh lebih dari :max karakter.',
            'gambar.image' => 'File harus berupa gambar',
            'isi.required' => 'Isi Artikel wajib diisi'
        ]);

        // Proses menyimpan artikel
        $artikel = artikel::create([
            'judul_artikel' => $request->judul,
            'isi_artikel' => $request->isi,
            'id_pengguna' => $request->id_pengguna
        ]);

        // Proses menyimpan gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = time().'    .'.$file->getClientOriginalExtension(); // Menggunakan waktu unik sebagai nama file
            $file->move(public_path('artikel'), $fileName); // Menyimpan file ke direktori artikel dengan nama yang sesuai

            // Simpan nama file gambar ke dalam database
            $artikel->gambar = $fileName;
            $artikel->save();
        }

        // Redirect atau respons sukses
        return redirect(route('dokter.artikel'))->with('success', 'Artikel Berhasil Ditambahkan');
    }

    public function artikel() {
        $user = Auth::user();
        $photo = $user->avatar ? 'profil/'.$user->avatar : '/images/defaultprofile.png';

        // Mengambil data artikel dari model, diurutkan berdasarkan created_at
        $artikel = Artikel::latest()->get();

        // Pisahkan artikel terbaru untuk dijadikan hero card
        $latestArticle = $artikel->shift();

        $title = 'Artikel';
        return view('dokter.artikel', compact('user', 'photo', 'artikel','latestArticle', 'title'));
    }
    public function lihatartikel() {
        $user = Auth::user();
        $photo = $user->avatar ? 'profil/'.$user->avatar : '/images/defaultprofile.png';

        $id_artikel = request()->query('id');

        if (!$id_artikel) {
            return redirect()->route('dokter.artikel');
        }

        $artikel = Artikel::findOrFail($id_artikel);
        $penulis = dinaspeternakan::where('id_pengguna',$artikel->id_pengguna)->first();
        // dd($penulis);
        if (!$penulis) {
                $penulis = dokterhewan::where('id_pengguna',$artikel->id_pengguna)->first();

        }

        $title = $artikel->judul_artikel;
        return view('dokter.lihatartikel', compact('user', 'photo','artikel','penulis', 'title'));
    }

    public function editartikel() {
        $user = Auth::user();
        $photo = $user->avatar ? 'profil/'.$user->avatar : '/images/defaultprofile.png';

        $id_artikel = request()->query('id');
        $artikel = Artikel::findOrFail($id_artikel);

        $title = 'Edit Artikel '.$artikel->judul_artikel;
        return view('dokter.editartikel', compact('user', 'photo', 'artikel', 'title'));
    }

    public function storeeditartikel(Request $request) {
        $id = request()->query('id');

        // Validasi input
        $request->validate([
            'judul' => 'required',
            'gambar' => 'image', // Hapus validasi mimes untuk memperbolehkan semua jenis gambar
            'isi' => 'required'
        ], [
            'judul.required' => 'Judul Artikel wajib diisi',
            'gambar.image' => 'File harus berupa gambar',
            'isi.required' => 'Isi Artikel wajib diisi'
        ]);

        // Cari artikel yang akan diedit berdasarkan ID
        $artikel = artikel::findOrFail($id);

        // Perbarui data artikel
        $artikel->judul_artikel = $request->judul;
        $artikel->isi_artikel = $request->isi;

        // Proses menyimpan gambar baru jika ada
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = time() . '.' . $file->getClientOriginalExtension(); // Menggunakan waktu unik sebagai nama file
            $file->move(public_path('artikel'), $fileName); // Menyimpan file ke direktori artikel dengan nama yang sesuai

            // Hapus gambar lama jika ada
            if ($artikel->gambar) {
                unlink(public_path('artikel/' . $artikel->gambar));
            }

            // Simpan nama file gambar baru ke dalam database
            $artikel->gambar = $fileName;
        }

        // Simpan perubahan pada artikel
        $artikel->save();

        // Redirect atau respons sukses
        return redirect(route('dokter.lihatartikel',['id'=> $id]))->with('success', 'Perubahan Berhasil Disimpan.');
    }

    public function program() {
        $user = Auth::user();
        $photo = $user->avatar ? 'profil/'.$user->avatar : '/images/defaultprofile.png';

        $program = program::latest()->get();

        $latestProgram = $program->shift();
        $title = 'Program';
        return view('dokter.program', compact('user', 'photo','latestProgram','program', 'title'));
    }

    public function lihatprogram() {
        $user = Auth::user();
        $photo = $user->avatar ? 'profil/'.$user->avatar : '/images/defaultprofile.png';

        $id_artikel = request()->query('id');

        if (!$id_artikel) {
            return redirect()->route('dokter.artikel');
        }

        $program = program::findOrFail($id_artikel);
        $jadwalprogram = jadwalprogram::where('id_program',$program->id)->get();

        // dd($jadwalprogram);

        $title = $program->nama_program;
        return view('dokter.lihatprogram', compact('user', 'photo','program','jadwalprogram','title'));
    }

    public function laporan() {
        $user = Auth::user();
        $photo = $user->avatar ? 'profil/'.$user->avatar : '/images/defaultprofile.png';
        // Mengambil data artikel dari model, diurutkan berdasarkan created_at
        $laporan = laporan::latest()->where('id_dokter',$user->id)->get();

        // Pisahkan laporan terbaru untuk dijadikan hero card
        $latestlaporan = $laporan->shift();
        $title = 'Laporan';
        return view('dokter.laporan', compact('user', 'photo','laporan','latestlaporan', 'title'));
    }
    public function tambahlaporan() {
        $user = Auth::user();
        $photo = $user->avatar ? 'profil/'.$user->avatar : '/images/defaultprofile.png';
        $peternak = peternak::all();

        $title = 'Tambah Laporan';
        return view('dokter.tambahlaporan', compact('user', 'photo', 'peternak', 'title'));
    }
    public function storetambahlaporan(Request $request) {
        $user = Auth::user();

        $validator = Validator::make($request->all(),[
            'judul' => 'required',
            'isi' => 'required',
            'peternak' => 'required',
        ],[
            'judul.required' => 'Judul Laporan wajib diisi',
            'isi.required' => 'Isi Laporan wajib diisi',
            'peternak.required' => 'Peternak wajib diisi',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        laporan::create([
            'judul_laporan' => $request->judul,
            'isi_laporan' => $request->isi,
            'id_peternak' => intval($request->peternak),
            'id_dokter' => $user->id

        ]);

        return redirect(route('dokter.laporan'))->with('success', 'Laporan Berhasil Dibuat');
    }

    public function lihatlaporan() {
        $user = Auth::user();
        $photo = $user->avatar ? 'profil/'.$user->avatar : '/images/defaultprofile.png';


        $id_laporan = request()->query('id');

        if (!$id_laporan) {
            return redirect()->route('dokter.laporan')->with('success','Laporan Berhasil Dibuat');
        }

        $laporan = laporan::findOrFail($id_laporan);

        $title = $laporan->judul_laporan;
        return view('dokter.lihatlaporan', compact('user', 'photo','laporan', 'title'));
    }

    public function editlaporan() {
        $user = Auth::user();
        $photo = $user->avatar ? 'profil/'.$user->avatar : '/images/defaultprofile.png';
        $peternak = peternak::all();

        $id_laporan = request()->query('id');
        $laporan = laporan::findOrFail($id_laporan);


        $title = 'Edit Laporan';
        return view('dokter.editlaporan', compact('user', 'photo','laporan','peternak', 'title'));
    }

    public function storeeditlaporan(Request $request) {
        $user = Auth::user();
        $id_laporan = request()->query('id');
        $validator = Validator::make($request->all(),[
            'judul' => 'required',
            'isi' => 'required',
            'peternak' => 'required',
        ],[
            'judul.required' => 'Judul Laporan wajib diisi',
            'isi.required' => 'Isi Laporan wajib diisi',
            'peternak.required' => 'Peternak wajib diisi',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $laporan = Laporan::findOrFail($id_laporan);
        // Mengupdate laporan
        $laporan->judul_laporan = $request->judul;
        $laporan->isi_laporan = $request->isi;
        $laporan->id_peternak = intval($request->peternak);
        $laporan->save();

        return redirect(route('dokter.lihatlaporan',['id'=> $id_laporan]))->with('success', 'Perubahan Berhasil Disimpan.');

    }
}