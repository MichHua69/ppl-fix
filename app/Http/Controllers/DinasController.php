<?php

namespace App\Http\Controllers;

use App\Models\desa;
use App\Models\alamat;
use App\Models\artikel;
use App\Models\program;
use App\Models\wilayah;
use App\Models\pengguna;
use App\Models\peternak;
use App\Models\kecamatan;
use App\Models\puskeswan;
use App\Models\dokterhewan;
use Illuminate\Http\Request;
use App\Models\jadwalprogram;
use App\Models\dinaspeternakan;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
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
        $latestArticles = artikel::latest()->take(4)->get();
        $latestProgram = program::latest()->take(4)->get();
    
        return view('dinas.informasiprogram', compact('user', 'photo', 'latestArticles','latestProgram'));
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

    public function tambahprogram() {
        $user = Auth::user();
        $photo= $user->avatar;

        if ($photo != null) {
            $photo = 'storage/' . $user->avatar;
        } else {
            $photo = '/images/defaultprofile.png';
        }
        $puskeswan = puskeswan::all();
        $numTbodies = Session::get('numTbodies', 0);
        return view('dinas.tambahprogram' , compact('user','photo','puskeswan','numTbodies'));
    }
    
    public function storetambahprogram(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'sesi.*' => 'required|string|max:255',
            'tanggal.*' => 'required|date',
            'waktu_mulai.*' => 'required|date_format:H:i',
            'waktu_selesai.*' => 'required|date_format:H:i',
            'puskeswan.*' => 'required|exists:puskeswan,id',
        ], [
            'nama.required' => 'Kolom Nama Program wajib diisi.',
            'nama.string' => 'Kolom Nama Program harus berupa teks.',
            'nama.max' => 'Kolom Nama Program tidak boleh lebih dari :max karakter.',
            'deskripsi.required' => 'Kolom Deskripsi wajib diisi.',
            'deskripsi.string' => 'Kolom Deskripsi harus berupa teks.',
            'sesi.*.required' => 'Kolom Sesi wajib diisi.',
            'sesi.*.string' => 'Kolom Sesi harus berupa teks.',
            'sesi.*.max' => 'Kolom Sesi tidak boleh lebih dari :max karakter.',
            'tanggal.*.required' => 'Kolom Tanggal wajib diisi.',
            'tanggal.*.date' => 'Kolom Tanggal harus berupa format tanggal yang valid.',
            'waktu_mulai.*.required' => 'Kolom Waktu Mulai wajib diisi.',
            'waktu_mulai.*.date_format' => 'Kolom Waktu Mulai harus berupa format waktu yang valid (HH:mm).',
            'waktu_selesai.*.required' => 'Kolom Waktu Selesai wajib diisi.',
            'waktu_selesai.*.date_format' => 'Kolom Waktu Selesai harus berupa format waktu yang valid (HH:mm).',
            'puskeswan.*.required' => 'Kolom Puskeswan wajib diisi.',
            'puskeswan.*.exists' => 'Puskeswan yang dipilih tidak valid.',
        ]);

        if ($validator->fails()) {
            $numTbodies = count($request->input('sesi'));
            session()->flash('numTbodies', $numTbodies);
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }

        // Simpan program
        $program = new Program();
        $program->nama_program = $request->nama;
        $program->deskripsi = $request->deskripsi;
        $program->save();

        // Simpan jadwal
        foreach ($request->sesi as $key => $sesi) {
            $jadwal = new jadwalprogram();
            $jadwal->sesi = $sesi;
            $jadwal->tanggal = $request->tanggal[$key];
            $jadwal->waktu_mulai = $request->waktu_mulai[$key];
            $jadwal->waktu_selesai = $request->waktu_selesai[$key];
            $jadwal->id_puskeswan = $request->puskeswan[$key];
            $jadwal->id_program = $program->id; // Tautkan jadwal dengan program
            $jadwal->save();
        }


        return redirect()->route('dinas.informasiprogram')->with('success', 'Program berhasil disimpan.');
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
        return view('dinas.program', compact('user', 'photo','latestProgram','program'));
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
            return redirect()->route('dinas.artikel');
        }

        $program = program::findOrFail($id_artikel);
        $jadwalprogram = jadwalprogram::where('id_program',$program->id)->get();

        // dd($jadwalprogram);

        return view('dinas.lihatprogram', compact('user', 'photo','program','jadwalprogram'));
    }

    public function editprogram() {
        $user = Auth::user();
        $photo = $user->avatar;
    
        if ($photo != null) {
            $photo = 'storage/'.$user->avatar;
        } else {
            $photo = '/images/defaultprofile.png';
        }
        
        $puskeswan = puskeswan::all();
        $id_program = request()->query('id');
        $program = program::findOrFail($id_program);
        $jadwalprogram = jadwalprogram::where('id_program',$program->id)->get();
        // dd($jadwalprogram);

        $numTbodies = jadwalprogram::where('id_program',$id_program)->count();
        session()->flash('numTbodies', $numTbodies);
        $numTbodies = Session::get('numTbodies', 0);
        
        return view('dinas.editprogram', compact('user', 'photo', 'program','puskeswan','jadwalprogram'));
    }

    public function storeeditprogram(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'sesi.*' => 'required|string|max:255',
            'tanggal.*' => 'required|date',
            'waktu_mulai.*' => 'required|date_format:H:i',
            'waktu_selesai.*' => 'required|date_format:H:i',
            'puskeswan.*' => 'required|exists:puskeswan,id',
            'jadwal_id.*' => 'nullable|exists:jadwalprogram,id', // Validasi untuk jadwal_id
        ], [
            'nama.required' => 'Kolom Nama Program wajib diisi.',
            'nama.string' => 'Kolom Nama Program harus berupa teks.',
            'nama.max' => 'Kolom Nama Program tidak boleh lebih dari :max karakter.',
            'deskripsi.required' => 'Kolom Deskripsi wajib diisi.',
            'deskripsi.string' => 'Kolom Deskripsi harus berupa teks.',
            'sesi.*.required' => 'Kolom Sesi wajib diisi.',
            'sesi.*.string' => 'Kolom Sesi harus berupa teks.',
            'sesi.*.max' => 'Kolom Sesi tidak boleh lebih dari :max karakter.',
            'tanggal.*.required' => 'Kolom Tanggal wajib diisi.',
            'tanggal.*.date' => 'Kolom Tanggal harus berupa format tanggal yang valid.',
            'waktu_mulai.*.required' => 'Kolom Waktu Mulai wajib diisi.',
            'waktu_mulai.*.date_format' => 'Kolom Waktu Mulai harus berupa format waktu yang valid (HH:mm).',
            'waktu_selesai.*.required' => 'Kolom Waktu Selesai wajib diisi.',
            'waktu_selesai.*.date_format' => 'Kolom Waktu Selesai harus berupa format waktu yang valid (HH:mm).',
            'puskeswan.*.required' => 'Kolom Puskeswan wajib diisi.',
            'puskeswan.*.exists' => 'Puskeswan yang dipilih tidak valid.',
            'jadwal_id.*.required' => 'Kolom Jadwal ID wajib diisi.', // Pesan untuk validasi jadwal_id
            'jadwal_id.*.exists' => 'Jadwal yang dipilih tidak valid.', // Pesan untuk validasi jadwal_id
        ]);
        
        if ($validator->fails()) {
            $numTbodies = count($request->input('sesi'));
            session()->flash('numTbodies', $numTbodies);
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        $id_program = $request->query('id');
    
        // Hapus semua data jadwal yang terkait dengan ID program yang sama
    jadwalprogram::where('id_program', $id_program)->delete();

    // Update program
    $program = program::findOrFail($id_program);
    $program->nama_program = $request->nama;
    $program->deskripsi = $request->deskripsi;
    $program->save();

    // Tambahkan data jadwal baru
    for ($i = 0; $i < count($request->sesi); $i++) {
        $jadwal = new jadwalprogram();
        $jadwal->id_program = $program->id;
        $jadwal->sesi = $request->sesi[$i];
        $jadwal->tanggal = $request->tanggal[$i];
        $jadwal->waktu_mulai = $request->waktu_mulai[$i];
        $jadwal->waktu_selesai = $request->waktu_selesai[$i];
        $jadwal->id_puskeswan = $request->puskeswan[$i];
        $jadwal->save();
    }
    
        return redirect()->route('dinas.informasiprogram')->with('success', 'Program berhasil diperbarui.');
    }

    public function layanan() {
        $user = Auth::user();
        $photo= $user->avatar;
        if ($photo != null) {
            $photo = 'storage/'.$user->avatar;
        } else {
            $photo = '/images/defaultprofile.png';
        }
        
        // $aktor = dokterhewan::with('pengguna','puskeswan')->get();
        // // dd($aktor);
        $puskeswan = puskeswan::all();
        $kecamatan = kecamatan::all();
        $desa = desa::all();
        

        return view ('dinas.layanan', compact('user', 'photo','puskeswan','kecamatan','desa') );
    }

    public function tambahlayanan() {
        $user = Auth::user();
        $photo= $user->avatar;
        $puskeswan = puskeswan::all();
        $kecamatan = kecamatan::all();
        $desa = desa::all();

        if ($photo != null) {
            $photo = 'storage/'.$user->avatar;
        } else {
            $photo = '/images/defaultprofile.png';
        }

        return view ('dinas.tambahlayanan', compact('user', 'photo','puskeswan','kecamatan','desa') );
    }

    public function storetambahlayanan(Request $request) {
        $validatedData = $request->validate([
            'puskeswan' => 'required|string|max:255',
            'Jalan' => 'required|string',
            'kecamatan' => 'required|exists:kecamatan,id',
            'desa' => 'required|exists:desa,id',
            'dusun' => 'required|string',
            'telepon' => 'required|max:20',
        ], [
            'puskeswan.required' => 'Kolom nama wajib diisi.',
            'puskeswan.string' => 'Kolom nama harus berupa teks.',
            'puskeswan.max' => 'Kolom nama tidak boleh lebih dari :max karakter.',
            'Jalan.required' => 'Kolom Jalan wajib diisi.',
            'Jalan.string' => 'Kolom Jalan harus berupa teks.',
            'kecamatan.required' => 'Kolom Kecamatan wajib dipilih.',
            'kecamatan.exists' => 'Kecamatan yang dipilih tidak valid.',
            'desa.required' => 'Kolom Desa wajib dipilih.',
            'desa.exists' => 'Desa yang dipilih tidak valid.',
            'dusun.required' => 'Kolom Dusun wajib diisi.',
            'dusun.string' => 'Kolom Dusun harus berupa teks.',
            'telepon.required' => 'Kolom Telepon wajib diisi.',
            'telepon.max' => 'No. Telepon maksimal 20 angka.',
        ]);

        $id_kecamatan = $request->input('kecamatan');
        $id_desa = $request->input('desa');

        // Cari data wilayah berdasarkan id_kecamatan dan id_desa dari request
        $wilayah = wilayah::where('id_kecamatan', intval($id_kecamatan))
                        ->orWhere('id_desa', intval($id_desa))
                        ->first();
        // dd($wilayah);
        $alamat = alamat::create([
            'jalan' => $request->Jalan,
            'id_wilayah' => $wilayah->id,
            'dusun' => $request->dusun,
        ]);
        $puskeswan = puskeswan::create([
            'puskeswan' => $request->puskeswan,
            'id_alamat' => $alamat->id,
            'telepon' => $request->telepon,
        ]);
        
        // Redirect ke halaman lain atau tampilkan pesan sukses
        return redirect()->route('dinas.layanan')->with('success', 'Puskeswan berhasil ditambahkan.');
    }

    public function editlayanan(Request $request) {
        // dd($request);
        $validator = Validator::make($request->all(),[
            'puskeswan' => 'required|string|max:255',
            'Jalan' => 'required|string|max:255',
            'kecamatan' => 'required|exists:kecamatan,id',
            'desa' => 'required|exists:desa,id',
            'dusun' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
        ], [
            'puskeswan.required' => 'Nama wajib diisi.',
            'puskeswan.string' => 'Nama harus berupa teks.',
            'puskeswan.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'Jalan.required' => 'Jalan wajib diisi.',
            'Jalan.string' => 'Jalan harus berupa teks.',
            'Jalan.max' => 'Jalan tidak boleh lebih dari 255 karakter.',
            'kecamatan.required' => 'Kecamatan wajib dipilih.',
            'kecamatan.exists' => 'Kecamatan yang dipilih tidak valid.',
            'desa.required' => 'Desa wajib dipilih.',
            'desa.exists' => 'Desa yang dipilih tidak valid.',
            'dusun.required' => 'Dusun harus diisi.',
            'dusun.string' => 'Dusun harus berupa teks.',
            'dusun.max' => 'Dusun tidak boleh lebih dari 255 karakter.',
            'telepon.required' => 'Telepon harus diisi.',
            'telepon.string' => 'Telepon harus berupa teks.',
            'telepon.max' => 'Telepon tidak boleh lebih dari 20 karakter.',
        ]);

        if ($validator->fails()) {
            session()->flash('error_modal', 'modaleditdata');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $puskeswan = puskeswan::where('id', $request->id)->firstOrFail();
        $alamat = $puskeswan->alamat;
        $wilayah = wilayah::where('id_kecamatan', intval($request->kecamatan))
                        ->where('id_desa', intval($request->desa))
                        ->first();

        $alamat->update([
            'jalan' => $request->Jalan,
            'dusun' => $request->dusun,
            'id_wilayah' => $wilayah->id,
        ]);

        $puskeswan->update([
            'puskeswan' => $request->puskeswan,
            'dusun' => $request->dusun,
            'id_wilayah' => $wilayah->id,
        ]);
        return redirect()->back()->with('success', 'PUSKESWAN Berhasil Diubah');
    }

    public function removelayanan(Request $request) {
        $puskeswan = puskeswan::findOrFail($request->id);
        $alamat = alamat::findOrFail($puskeswan->id_alamat);

        $puskeswan->delete();
        $alamat->delete();

        return redirect()->back()->with('success', 'PUSKESWAN Berhasil Dihapus');

    }
    
}
