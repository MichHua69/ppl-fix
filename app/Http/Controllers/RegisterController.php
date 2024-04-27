<?php

namespace App\Http\Controllers;

use App\Models\desa;
use App\Models\kecamatan;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        $kecamatan = kecamatan::all();
        $desa = desa::all();
        return view('register', compact('kecamatan', 'desa'));
    }
}
