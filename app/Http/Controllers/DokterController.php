<?php

namespace App\Http\Controllers;

use App\Models\dokterhewan;
use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Auth;

class DokterController extends Controller
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
        return view('dokter.dashboard', compact('user','photo'));
    }

    public function konsultasi(Request $request)
    {
        $user = Auth::user();
        $photo = $user->avatar;
        // dd($user);
        // $user = $request->session()->get('user');
        // $request->session()->get('user');
        // dd($request);

        $aktor = dokterhewan::with('pengguna', 'alamat')->where('id_pengguna', $user->id)->first();
        // dd($aktor);
        $data["friends"] = pengguna::whereNot("id", $user->id)->get();
        if ($photo != null) {
            $photo = 'storage/'.$user->avatar;
            return view('dokter.konsultasi',compact('user','data','aktor','photo') );
        }
        $photo = '/images/defaultprofile.png';
        return view('dokter.konsultasi',compact('user','data','aktor','photo') );
    }
}