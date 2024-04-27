<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'nama_pengguna' => 'required',
            'password' => 'required',
        ]);
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $request->session()->put('user', $user);
            
            if ($user->id_role == 3) {
                return redirect()->intended('/peternak/dashboard');
            } elseif ($user->id_role == 2){
                return redirect()->intended('/dokter/dashboard');
            } elseif ($user->id_role == 1){
                return redirect()->intended('/dinas/dashboard');
            } else {
                return redirect()->back()->with('loginError', 'Login Gagal');
            }
        }
        return redirect()->back()->with('loginError', 'Login Gagal');

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
