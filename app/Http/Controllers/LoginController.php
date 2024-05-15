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
        ],[
            'nama_pengguna.required' => 'Nama Pengguna / Email wajib diisi',
            'password.required' => 'Kata Sandi wajib diisi',
        ]);
        
        // Coba otentikasi dengan nama_pengguna
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $request->session()->put('user', $user);
            
            // Redirect sesuai dengan role user
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
    
        // Jika otentikasi dengan nama_pengguna gagal, coba dengan email
        $credentialsByEmail = $request->only('password');
        $credentialsByEmail['email'] = $credentials['nama_pengguna'];
        unset($credentialsByEmail['nama_pengguna']); // Hilangkan 'nama_pengguna' dari array credentialsByEmail
    
        if (Auth::attempt($credentialsByEmail)) {
            $user = Auth::user();
            $request->session()->put('user', $user);
            
            // Redirect sesuai dengan role user
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
    
        // Jika kedua otentikasi gagal, kembalikan ke halaman login dengan pesan error
        return redirect()->back()->with('loginError', 'Nama Pengguna atau Email dan Password tidak cocok');
    }
    

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
