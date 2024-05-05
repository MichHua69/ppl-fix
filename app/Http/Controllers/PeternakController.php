<?php

namespace App\Http\Controllers;

use App\Models\desa;
use App\Models\dusun;
use App\Models\pesan;
use App\Models\artikel;
use App\Models\program;
use App\Models\wilayah;
use App\Models\Pengguna;
use App\Models\peternak;
use App\Models\kecamatan;
use App\Models\dokterhewan;
use Illuminate\Http\Request;
use App\Models\jadwalprogram;
use App\Models\dinaspeternakan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PeternakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $photo = $user->avatar;


        if ($photo != null) {
            $photo = 'storage/'.$user->avatar;
            return view('peternak.dashboard', compact('user','photo'));
        }
        $photo = '/images/defaultprofile.png';
        return view('peternak.dashboard', compact('user','photo'));
    }

    public function profil(Request $request) {
        $user = Auth::user();
        $aktor = peternak::with('pengguna', 'alamat.wilayah.kecamatan', 'alamat.wilayah.desa')->where('id_pengguna', $user->id)->first();
        $kecamatan = kecamatan::all();
        $desa = desa::all();

        // dd($aktor->alamat->wilayah->kecamatan->id);

        $photo = $user->avatar;
        if ($photo != null) {
            $photo = 'storage/'.$user->avatar;
            return view('peternak.profil',compact('user','photo','kecamatan','desa'));
        } 
            $photo = '/images/defaultprofile.png';
        return view('peternak.profil',compact('user','aktor','photo','kecamatan','desa'));
    }

    public function saveprofil(Request $request) {
        $user = Auth::user();
        
        $aktor = peternak::with('pengguna', 'alamat.wilayah.kecamatan', 'alamat.wilayah.desa')->where('id_pengguna', $user->id)->first();
        
        $request->validate([
            'alamat' => 'required|string|max:255',
            'kecamatan' => 'required',
            'desa' => 'required',
            'dusun' => 'required|string',
            'telepon' => 'required|string|max:20',
            'nama_pengguna' => 'required|string|max:255',
            'password' => 'required|string|min:5',
            'file_input' => 'image|mimes:jpeg,png,jpg,gif,svg'
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
        $wilayah = wilayah::where('id_kecamatan',$request->kecamatan)->where('id_desa',$request )->first();
        // dd($aktor->pengguna->nama_pengguna);
        // dd($request->nama_pengguna);
        $aktor->alamat->jalan = $request->alamat;
        // $aktor->alamat->wilayah->id_kecamatan = $request->kecamatan;
        // $aktor->alamat->wilayah->id_desa = $request->desa;
        $aktor->alamat->dusun = $request->dusun;

        $aktor->telepon = $request->telepon;
        $aktor->pengguna->nama_pengguna = $request->nama_pengguna;
        $aktor->pengguna->password = Hash::make($request->password);
        dd($request);
        $aktor->save();

        return view('peternak.profil',compact('user','aktor','kecamatan','desa','dusun','kec','des','dus','photo'))->with('success', 'Profil berhasil diperbarui.');
    }

    public function konsultasi(Request $request)
    {
        $user = Auth::user();
        $photo = $user->avatar;
        // dd($user);
        // $user = $request->session()->get('user');
        // $request->session()->get('user');
        // dd($request);

        $aktor = Peternak::with('pengguna', 'alamat')->where('id_pengguna', $user->id)->first();
        // dd($aktor);
        $data["friends"] = pengguna::whereNot("id", $user->id)->get();
        if ($photo != null) {
            $photo = 'storage/'.$user->avatar;
            return view('peternak.konsultasi',compact('user','data','aktor','photo') );
        }
        $photo = '/images/defaultprofile.png';
        return view('peternak.konsultasi',compact('user','data','aktor','photo') );
    }

    public function informasiprogram(){
        $user = Auth::user();
        $photo = $user->avatar;
    
        if ($photo != null) {
            $photo = 'storage/' . $user->avatar;
        } else {
            $photo = '/images/defaultprofile.png';
        }
    
        // Mengambil 4 artikel terbaru dari model Artikel
        $latestArticles = artikel::latest()->take(4)->get();
        $latestProgram = program::latest()->take(4)->get();
    
        return view('peternak.informasiprogram', compact('user', 'photo', 'latestArticles','latestProgram'));
    }

    public function artikel() {
        $user = Auth::user();
        $photo = $user->avatar;
    
        if ($photo != null) {
            $photo = 'storage/' . $user->avatar;
        } else {
            $photo = '/images/defaultprofile.png';
        }
    
        // Mengambil data artikel dari model, diurutkan berdasarkan created_at
        $artikel = Artikel::latest()->get();
    
        // Pisahkan artikel terbaru untuk dijadikan hero card
        $latestArticle = $artikel->shift();
    
        return view('peternak.artikel', compact('user', 'photo', 'artikel','latestArticle'));
    }
    public function lihatartikel() {
        $user = Auth::user();
        $photo = $user->avatar;
    
        if ($photo != null) {
            $photo = 'storage/' . $user->avatar;
        } else {
            $photo = '/images/defaultprofile.png';
        }
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
        $photo = $user->avatar;
    
        if ($photo != null) {
            $photo = 'storage/' . $user->avatar;
        } else {
            $photo = '/images/defaultprofile.png';
        }
        $program = program::latest()->get();
    
        $latestProgram = $program->shift();
        return view('peternak.program', compact('user', 'photo','latestProgram','program'));
    }

    public function lihatprogram() {
        $user = Auth::user();
        $photo = $user->avatar;
    
        if ($photo != null) {
            $photo = 'storage/' . $user->avatar;
        } else {
            $photo = '/images/defaultprofile.png';
        }
        $id_artikel = request()->query('id');

        if (!$id_artikel) { 
            return redirect()->route('peternak.artikel');
        }

        $program = program::findOrFail($id_artikel);
        $jadwalprogram = jadwalprogram::where('id_program',$program->id)->get();

        // dd($jadwalprogram);

        return view('peternak.lihatprogram', compact('user', 'photo','program','jadwalprogram'));
    }
}