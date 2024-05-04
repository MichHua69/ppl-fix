<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use App\Models\desa;
use App\Models\wilayah;
use App\Models\pengguna;
use App\Models\peternak;
use App\Models\kecamatan;
use App\Models\puskeswan;
use App\Models\dokterhewan;
use Illuminate\Http\Request;
use App\Models\dinaspeternakan;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class DinasController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $photo= $user->avatar;
        if ($photo != null) {
            $photo = 'storage/'.$user->avatar;
            return view('dokter.dashboard', compact('user','photo'));
        } 
        $photo = '/images/defaultprofile.png';
        return view('dinas.dashboard', compact('user','photo'));
    }

    public function profil(Request $request) {
        $user = Auth::user();
        $aktor = dinaspeternakan::with('pengguna')->where('id_pengguna', $user->id)->first();
        $kecamatan = kecamatan::all();
        $desa = desa::all();

        // dd($aktor->alamat->wilayah->kecamatan->id);

        $photo = $user->avatar;
        if ($photo != null) {
            $photo = 'storage/'.$user->avatar;
            return view('dinas.profil',compact('user','photo','kecamatan','desa'));
        } 
            $photo = '/images/defaultprofile.png';
        return view('dinas.profil',compact('user','aktor','photo','kecamatan','desa'));
    }

    public function saveprofil(Request $request) {
        $user = Auth::user();
        
        $aktor = dinaspeternakan::with('pengguna')->where('id_pengguna', $user->id)->first();
        
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

        return view('dokter.profil',compact('user','aktor','kecamatan','desa','dusun','kec','des','dus','photo'))->with('success', 'Profil berhasil diperbarui.');
    }
        
    public function buatakun() {
        $user = Auth::user();
        $photo= $user->avatar;
        $puskeswan = puskeswan::all();

        if ($photo != null) {
            $photo = 'storage/'.$user->avatar;
            return view('dinas.buatakun', compact('user','photo','puskeswan'));
        } 
        $photo = '/images/defaultprofile.png';


        return view ('dinas.buatakun', compact('user', 'photo','puskeswan') );
    }
    public function buatakunstore(Request $request) {
        
        $request->validate([
            'puskeswan' => 'required',
            'nama'=>'required|string',
            'nama_pengguna' => 'required|string|max:255|unique:pengguna,nama_pengguna',
            'email' => 'required|string|max:255|unique:pengguna,email',
            'password' => 'required|string|min:5',
            ],
            
            [
                
                'puskeswan' => [ 'required' => 'Puskeswan wajib diisi.' ], 
                'nama' => [ 'required' => 'Nama wajib diisi.', 'string' => 'Nama harus berupa string.' ], 
                'nama_pengguna' => [ 'required' => 'Nama Pengguna wajib diisi.', 'string' => 'Nama Pengguna harus berupa string.', 'max' => 'Nama Pengguna maksimal : 255 karakter.', 'unique' => 'Nama Pengguna sudah terdaftar.', ], 
                'email' => [ 'required' => 'Email wajib diisi.', 'string' => 'Email harus berupa string.', 'max' => 'Email maksimal : 255 karakter.', 'unique' => 'Email sudah terdaftar.', ], 
                'password' => [ 'required' => 'Kata Sandi wajib diisi.', 'string' => 'Kata Sandi harus berupa string.', 'min' => 'Kata Sandi minimal 5 karakter.', 'confirmed' => 'Konfirmasi Kata Sandi tidak sesuai.'],
            ]);

        $pengguna = pengguna::create([
            'nama_pengguna' => $request->nama_pengguna,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_role'=> 2,
        ]);
        $dokter = dokterhewan::create([
            'nama' => $request->nama,
            'id_puskeswan' => intval($request->puskeswan),
            'id_pengguna' => $pengguna->id,
        ]);

        $user = Auth::user();
        $photo= $user->avatar;
        if ($photo != null) {
            $photo = 'storage/'.$user->avatar;
            return view('dinas.akundokter', compact('user','photo'));
        } 
        $photo = '/images/defaultprofile.png';
        
        $aktor = dokterhewan::with('pengguna','puskeswan')->get();
        // dd($aktor);
        $puskeswan = puskeswan::all();

        return redirect()-> route('dinas.akundokter', compact('user', 'photo','aktor','puskeswan'))->with('success','Data Berhasil Ditambahkan');
    }
    
    public function akunpeternak() {
        $user = Auth::user();
        $photo= $user->avatar;

        $peternak = peternak::with('pengguna')->get();
        // dd($peternak);
        if ($photo != null) {
            $photo = 'storage/'.$user->avatar;
            return view('dinas.akunpeternak', compact('user','photo','peternak'));
        } 
        $photo = '/images/defaultprofile.png';
        return view ('dinas.akunpeternak', compact('user', 'photo','peternak') );
    }

    
    public function akundokter() {
        $user = Auth::user();
        $photo= $user->avatar;
        if ($photo != null) {
            $photo = 'storage/'.$user->avatar;
            return view('dinas.akundokter', compact('user','photo'));
        } 
        $photo = '/images/defaultprofile.png';
        
        $aktor = dokterhewan::with('pengguna','puskeswan')->get();
        // dd($aktor);
        $puskeswan = puskeswan::all();

        return view ('dinas.akundokter', compact('user', 'photo','aktor','puskeswan') );
    }

    public function editakundokter(Request $request){
        // Temukan pengguna berdasarkan id_pengguna dari request
        $pengguna = pengguna::findOrFail($request->id_pengguna);
        // dd($pengguna);
        $validator = Validator::make($request->all(), [
            'nama_pengguna' => 'required|string|max:255|unique:pengguna,nama_pengguna,'.$pengguna->id,
            'email' => 'required|string|max:255|unique:pengguna,email,'.$pengguna->id,
            'nama' => 'required',
            'puskeswan' => 'required',
        ],
        [    
            'puskeswan' => [ 'required' => 'Puskeswan wajib diisi.' ], 
            'nama' => [ 'required' => 'Nama wajib diisi.', 'string' => 'Nama harus berupa string.' ], 
            'nama_pengguna' => [ 'required' => 'Nama Pengguna wajib diisi.', 'string' => 'Nama Pengguna harus berupa string.', 'max' => 'Nama Pengguna maksimal : 255 karakter.', 'unique' => 'Nama Pengguna sudah terdaftar.', ], 
            'email' => [ 'required' => 'Email wajib diisi.', 'string' => 'Email harus berupa string.', 'max' => 'Email maksimal : 255 karakter.', 'unique' => 'Email sudah terdaftar.', ], 
            'password' => [ 'required' => 'Kata Sandi wajib diisi.', 'string' => 'Kata Sandi harus berupa string.', 'min' => 'Kata Sandi minimal 5 karakter.', 'confirmed' => 'Konfirmasi Kata Sandi tidak sesuai.'],
        ]);
    
        // Jika validasi gagal, kembalikan respons redirect dengan kesalahan yang diberikan oleh validator
        if ($validator->fails()) {
            session()->flash('error_modal', 'modaleditdata');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
    
        // Temukan dokter hewan berdasarkan id_pengguna dari request
        $dokter = dokterhewan::where('id_pengguna', $request->id_pengguna)->firstOrFail();
        
        // Perbarui atribut pengguna dengan nilai baru dari request
        $pengguna->update([
            'nama_pengguna' => $request->nama_pengguna,
            'email' => $request->email,
        ]);
        // Perbarui atribut dokter hewan dengan nilai baru dari request
        $dokter->update([
            'nama' => $request->nama,
            'puskeswan' => $request->puskeswan,
        ]);
    
        // Redirect atau tampilkan pesan sukses atau lakukan tindakan lain yang sesuai
        return redirect()->back()->with('success', 'Data pengguna berhasil diperbarui.');
    }

    public function resetpasswordakundokter(Request $request){
        $dokter = pengguna::findOrFail($request->id_pengguna);

        $validator = Validator::make($request->all(), [
            'password' => 'required|min:5',
        ],
        [    
            'password' => [ 'required' => 'Kata Sandi wajib diisi.', 'string' => 'Kata Sandi harus berupa string.', 'min' => 'Kata Sandi minimal 5 karakter.', 'confirmed' => 'Konfirmasi Kata Sandi tidak sesuai.'],
        ]);
    
        // Jika validasi gagal, kembalikan respons redirect dengan kesalahan yang diberikan oleh validator
        if ($validator->fails()) {
            session()->flash('error_modal', 'modalresetpassword');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $dokter->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect()->back()->with('success', 'Password berhasil diganti.');
    }
    public function removeakundokter(Request $request){
        // dd($request);
        // Menghapus dokter hewan yang memiliki id_pengguna yang sama dengan $request->id_pengguna
        DokterHewan::where('id_pengguna', $request->id_pengguna)->delete();
        
        $pengguna = Pengguna::findOrFail($request->id_pengguna);

        // Menghapus pengguna
        $pengguna->delete();
        

        return redirect()->back()->with('success', 'Akun Berhasil Dihapus');
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
        $latestArticles = Artikel::latest()->take(4)->get();
    
        return view('dinas.informasiprogram', compact('user', 'photo', 'latestArticles'));
    }
    

    public function tambahartikel() {
        $user = Auth::user();
        $photo= $user->avatar;

        if ($photo != null) {
            $photo = 'storage/'.$user->avatar;
            return view('dinas.tambahartikel', compact('user','photo'));
        } 
        $photo = '/images/defaultprofile.png';
        return view('dinas.tambahartikel' , compact('user','photo'));
    }

    public function storetambahartikel(Request $request) {
        
        $request->validate([
            'judul' => 'required',
            'gambar' => 'image', // Hapus validasi mimes untuk memperbolehkan semua jenis gambar
            'isi' => 'required'
        ], [
            'judul.required' => 'Judul Artikel wajib diisi',
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
        return redirect(route('dinas.informasiprogram'))->with('success', 'Artikel berhasil dibuat');
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
    
        return view('dinas.artikel', compact('user', 'photo', 'artikel','latestArticle'));
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
            return redirect()->route('dinas.artikel');
        }

        $artikel = Artikel::findOrFail($id_artikel);
        $penulis = dinaspeternakan::where('id_pengguna',$artikel->id_pengguna)->first();
        // dd($penulis);
        if (!$penulis) {
                $penulis = dokterhewan::where('id_pengguna',$artikel->id_pengguna)->first();
            
        }

        return view('dinas.lihatartikel', compact('user', 'photo','artikel','penulis'));
    }

    public function editartikel() {
        $user = Auth::user();
        $photo = $user->avatar;
    
        if ($photo != null) {
            $photo = 'storage/'.$user->avatar;
        } else {
            $photo = '/images/defaultprofile.png';
        }
    
        $id_artikel = request()->query('id');
        $artikel = Artikel::findOrFail($id_artikel);
    
        return view('dinas.editartikel', compact('user', 'photo', 'artikel'));
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
        $artikel = Artikel::findOrFail($id);
        
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
        return redirect(route('dinas.lihatartikel',['id'=> $id]))->with('success', 'Artikel berhasil diperbarui');
    }

}
