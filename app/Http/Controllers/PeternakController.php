<?php

namespace App\Http\Controllers;

use App\Models\desa;
use App\Models\dusun;
use App\Models\pesan;
use App\Models\Pengguna;
use App\Models\peternak;
use App\Models\kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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