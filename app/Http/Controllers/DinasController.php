<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        
    public function buatakun() {
        $user = Auth::user();
        $photo= $user->avatar;
        if ($photo != null) {
            $photo = 'storage/'.$user->avatar;
            return view('dinas.buatakun', compact('user','photo'));
        } 
        $photo = '/images/defaultprofile.png';
        return view ('dinas.buatakun', compact('user', 'photo') );
    }

    public function akundokter() {
        $user = Auth::user();
        $photo= $user->avatar;
        if ($photo != null) {
            $photo = 'storage/'.$user->avatar;
            return view('dinas.akundokter', compact('user','photo'));
        } 
        $photo = '/images/defaultprofile.png';
        return view ('dinas.akundokter', compact('user', 'photo') );
    }
    
    public function akunpeternak() {
        $user = Auth::user();
        $photo= $user->avatar;
        if ($photo != null) {
            $photo = 'storage/'.$user->avatar;
            return view('dinas.akunpeternak', compact('user','photo'));
        } 
        $photo = '/images/defaultprofile.png';
        return view ('dinas.akunpeternak', compact('user', 'photo') );
    }
}
