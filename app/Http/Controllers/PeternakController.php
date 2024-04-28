<?php

namespace App\Http\Controllers;

use App\Models\desa;
use App\Models\dusun;
use App\Models\pesan;
use App\Models\wilayah;
use App\Models\Pengguna;
use App\Models\peternak;
use App\Models\kecamatan;
use Illuminate\Http\Request;
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}