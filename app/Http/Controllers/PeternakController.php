<?php

namespace App\Http\Controllers;

use App\Models\desa;
use App\Events\Notif;
use App\Models\dusun;
use App\Models\pesan;
use App\Models\artikel;
use App\Models\laporan;
use App\Models\program;
use App\Models\wilayah;
use App\Models\Pengguna;
use App\Models\peternak;
use App\Models\kecamatan;
use App\Models\puskeswan;
use App\Models\notifikasi;
use App\Models\percakapan;
use App\Models\dokterhewan;
use Illuminate\Http\Request;
use App\Models\jadwalprogram;
use App\Models\dinaspeternakan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PeternakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        
        $photo = $user->avatar ? 'profil/'.$user->avatar : '/images/defaultprofile.png';
        $notifikasi = notifikasi::latest()->get();

        return view('peternak.dashboard', compact('user','photo','notifikasi'));
    }

    public function profil() {
        $user = Auth::user();
        $aktor = peternak::with('pengguna', 'alamat.wilayah.kecamatan', 'alamat.wilayah.desa')->where('id_pengguna', $user->id)->first();
        // dd($aktor);
        $kecamatan = kecamatan::all();
        $desa = desa::all();

        // dd($aktor->alamat->wilayah->kecamatan->id);

        $photo = $user->avatar ? 'profil/'.$user->avatar : '/images/defaultprofile.png';

        return view('peternak.profil',compact('user','aktor','photo','kecamatan','desa'));
    }

    public function saveprofil(Request $request) {
        $user = Auth::user();

        $aktor = peternak::with('pengguna', 'alamat.wilayah.kecamatan', 'alamat.wilayah.desa')->where('id_pengguna', $user->id)->first();
        // dd($request);
        $validator = Validator::make($request->all(),[
            'alamat' => 'required|string|max:255',
            'kecamatan' => 'required',
            'desa' => 'required',
            'dusun' => 'required|string',
            'telepon' => 'required|string|max:20',
            'nama_pengguna' => 'required|string|max:255',
            'password' => 'required|string|min:5',
            'file_input' => 'image'
            ],

            [

                'alamat' => [ 'required' => 'Alamat wajib diisi.', 'string' => 'Alamat harus berupa string.', 'max' => 'Alamat maksimal : 255 karakter.', ],

                'kecamatan' => [ 'required' => 'Kecamatan wajib diisi.', 'string' => 'Kecamatan harus berupa string.', ],

                'desa' => [ 'required' => 'Desa wajib diisi.', 'string' => 'Desa harus berupa string.', ],

                'dusun' => [ 'required' => 'Dusun wajib diisi.', 'string' => 'Dusun harus berupa string.', ],

                'telepon' => [ 'required' => 'No. Telepon wajib diisi.', 'string' => 'No. Telepon harus berupa string.', 'max' => 'No. Telepon maksimal : 20 karakter.', 'unique' => 'No. Telepon sudah terdaftar.', ],

                'nama_pengguna' => [ 'required' => 'Nama Pengguna wajib diisi.', 'string' => 'Nama Pengguna harus berupa string.', 'max' => 'Nama Pengguna maksimal : 255 karakter.', 'unique' => 'Nama Pengguna sudah terdaftar.', ],

                'password' => [ 'required' => 'Kata Sandi wajib diisi.', 'string' => 'Kata Sandi harus berupa string.', 'min' => 'Kata Sandi minimal 5 karakter.', 'confirmed' => 'Konfirmasi Kata Sandi tidak sesuai.'],

                'file_input' => ['image' => 'File harus berupa gambar.'],
                'billing_same' => 'accepted',
            ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
    
        // Handle avatar upload
        $wilayah = wilayah::where('id_kecamatan', intval($request->kecamatan))->where('id_desa', intval($request->desa))->first();
    
        $aktor->alamat->jalan = $request->alamat;
        $aktor->alamat->dusun = $request->dusun;
        $aktor->alamat->id_wilayah = $wilayah->id;
        $aktor->telepon = $request->telepon;
        $aktor->pengguna->nama_pengguna = $request->nama_pengguna;
        $aktor->pengguna->password = Hash::make($request->password);
        
        $aktor->alamat->save();
        $aktor->pengguna->save();
        $aktor->save();

        // Rename file avatar
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


        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }

    public function konsultasi(Request $request)
    {
        $user = Auth::user();
        $photo = $user->avatar;

        // Mendapatkan data peternak yang sedang masuk
        $aktor = Peternak::with('pengguna', 'alamat')->where('id_pengguna', $user->id)->first();

        // Mendapatkan daftar pengguna yang terkait dengan kolom "users" dalam tabel percakapan
        $relatedUsers = Percakapan::pluck('users')->unique()->map(function ($item) {
            return explode(':', $item);
        })->flatten()->unique();

        // Mendapatkan daftar pengguna yang terkait dengan kolom "users" dalam tabel percakapan
        $friendsWithId = Pengguna::whereIn('id', $relatedUsers)->whereNot("id", $user->id)->get();

        // Mendapatkan daftar pengguna yang tidak terkait dengan kolom "users" dalam tabel percakapan
        $friendsWithoutId = Pengguna::where('id_role', 2)->whereNotIn('id', [$user->id])->get();



        // Mengatur foto profil
        $photo = $user->avatar ? 'profil/'.$user->avatar : '/images/defaultprofile.png';

        return view('peternak.konsultasi', compact('user', 'aktor', 'photo', 'friendsWithId', 'friendsWithoutId'));
    }

    public function loadkiri(){
        $user = Auth::user();

        // Mendapatkan data peternak yang sedang masuk
        $aktor = Peternak::with('pengguna', 'alamat')->where('id_pengguna', $user->id)->first();

        // Mendapatkan daftar pengguna yang terkait dengan kolom "users" dalam tabel percakapan
        $relatedUsers = Percakapan::pluck('users')->unique()->map(function ($item) {
            return explode(':', $item);
        })->flatten()->unique();

        // Mendapatkan daftar pengguna yang terkait dengan kolom "users" dalam tabel percakapan
        $friendsWithId = Pengguna::whereIn('id', $relatedUsers)->whereNot("id", $user->id)->get();

        // Mengatur foto profil
        $photo = $user->avatar ? 'profil/'.$user->avatar : '/images/defaultprofile.png';

        // Menggabungkan data dalam satu array sebelum dikirim sebagai respons JSON
        $responseData = [
            'user' => $user,
            'aktor' => $aktor,
            'photo' => $photo,
            'friendsWithId' => $friendsWithId,
        ];

        return response()->json($responseData);
    }




    public function informasiprogram(){
        $user = Auth::user();
        $photo = $user->avatar ? 'profil/'.$user->avatar : '/images/defaultprofile.png';

        // Mengambil 4 artikel terbaru dari model Artikel
        $latestArticles = artikel::latest()->take(4)->get();
        $latestProgram = program::latest()->take(4)->get();

        return view('peternak.informasiprogram', compact('user', 'photo', 'latestArticles','latestProgram'));
    }

    public function artikel() {
        $user = Auth::user();
        $photo = $user->avatar ? 'profil/'.$user->avatar : '/images/defaultprofile.png';

        // Mengambil data artikel dari model, diurutkan berdasarkan created_at
        $artikel = Artikel::latest()->get();

        // Pisahkan artikel terbaru untuk dijadikan hero card
        $latestArticle = $artikel->shift();

        return view('peternak.artikel', compact('user', 'photo', 'artikel','latestArticle'));
    }
    public function lihatartikel() {
        $user = Auth::user();
        $photo = $user->avatar ? 'profil/'.$user->avatar : '/images/defaultprofile.png';
        
        $id_artikel = request()->query('id');

        if (!$id_artikel) {
            return redirect()->route('peternak.artikel');
        }

        $artikel = Artikel::findOrFail($id_artikel);
        $penulis = dinaspeternakan::where('id_pengguna',$artikel->id_pengguna)->first();
        // dd($penulis);
        if (!$penulis) {
                $penulis = dokterhewan::where('id_pengguna',$artikel->id_pengguna)->first();

        }

        return view('peternak.lihatartikel', compact('user', 'photo','artikel','penulis'));
    }

    public function program() {
        $user = Auth::user();
        $photo = $user->avatar ? 'profil/'.$user->avatar : '/images/defaultprofile.png';

        $program = program::latest()->get();

        $latestProgram = $program->shift();
        return view('peternak.program', compact('user', 'photo','latestProgram','program'));
    }

    public function lihatprogram() {
        $user = Auth::user();

        $photo = $user->avatar ? 'profil/'.$user->avatar : '/images/defaultprofile.png';

        $id_artikel = request()->query('id');

        if (!$id_artikel) {
            return redirect()->route('peternak.artikel');
        }

        $program = program::findOrFail($id_artikel);
        $jadwalprogram = jadwalprogram::where('id_program',$program->id)->get();

        // dd($jadwalprogram);

        return view('peternak.lihatprogram', compact('user', 'photo','program','jadwalprogram'));
    }

    public function layanan() {
        $user = Auth::user();

        $puskeswan = puskeswan::all();
        // dd($puskeswan);
        $photo = $user->avatar ? 'profil/'.$user->avatar : '/images/defaultprofile.png';

        return view ('peternak.layanan', compact('user', 'photo','puskeswan') );
    }

    public function laporan() {
        $user = Auth::user();
        $photo = $user->avatar ? 'profil/'.$user->avatar : '/images/defaultprofile.png';
        $laporan = laporan::latest()->where('id_peternak',$user->id)->get();

        // Pisahkan laporan terbaru untuk dijadikan hero card
        $latestlaporan = $laporan->shift();
        return view('peternak.laporan', compact('user', 'photo','laporan','latestlaporan'));
    }

    public function lihatlaporan() {
        $user = Auth::user();
        $photo = $user->avatar ? 'profil/'.$user->avatar : '/images/defaultprofile.png';

        $id_laporan = request()->query('id');

        if (!$id_laporan) {
            return redirect()->route('dokter.laporan')->with('success','Laporan Berhasil Dibuat');
        }

        $laporan = laporan::findOrFail($id_laporan);
        if(!($laporan->id_peternak == $user->id) ){
            return redirect(route('peternak.laporan'));
        }
        return view('peternak.lihatlaporan', compact('user', 'photo','laporan'));
    }

    public function loadNotification() {
        $notifikasi = Notifikasi::orderBy('updated_at', 'desc')->get();
        return response()->json([
            'success' => true,
            'data' => $notifikasi,
        ]);
    }
    
}