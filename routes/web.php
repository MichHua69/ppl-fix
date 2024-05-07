<?php

use App\Events\MassageCreated;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DinasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PeternakController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Http\Request;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware(['role:1'])->group(function () {
    Route::get('/dinas/dashboard', [DinasController::class, 'index'])->name('dinas.dashboard');

    //profil
    Route::get('/dinas/profil', [DinasController::class, 'profil'])->name('dinas.profil');
    Route::post('/dinas/profil/save', [DinasController::class, 'saveprofil'])->name('dinas.profil.save');

    //akun
    Route::get('/dinas/buatakun', [DinasController::class, 'buatakun'])->name('dinas.buatakun');
    Route::post('/dinas/buatakun/store', [DinasController::class, 'buatakunstore'])->name('dinas.buatakun.store');
    Route::get('/dinas/akundokter', [DinasController::class, 'akundokter'])->name('dinas.akundokter');
    Route::post('/dinas/akundokter/edit', [DinasController::class, 'editakundokter'])->name('dinas.editakundokter');
    Route::post('/dinas/akundokter/resetpassword', [DinasController::class, 'resetpasswordakundokter'])->name('dinas.resetpasswordakundokter');
    Route::post('/dinas/akundokter/remove', [DinasController::class, 'removeakundokter'])->name('dinas.removeakundokter');
    Route::get('/dinas/akunpeternak', [DinasController::class, 'akunpeternak'])->name('dinas.akunpeternak');
    
    //informasiprogram
    Route::get('/dinas/informasiprogram', [DinasController::class, 'informasiprogram'])->name('dinas.informasiprogram');
    
    //informasiprogram-artikel
    Route::get('/dinas/informasiprogram/artikel',[DinasController::class, 'artikel'])->name('dinas.artikel');
    Route::get('/dinas/informasiprogram/lihatartikel',[DinasController::class, 'lihatartikel'])->name('dinas.lihatartikel');
    Route::get('/dinas/informasiprogram/tambahartikel',[DinasController::class, 'tambahartikel'])->name('dinas.tambahartikel');
    Route::get('/dinas/informasiprogram/editartikel',[DinasController::class, 'editartikel'])->name('dinas.editartikel');
    Route::get('/dinas/informasiprogram/tambahartikel',[DinasController::class, 'tambahartikel'])->name('dinas.tambahartikel');
    Route::post('/dinas/informasiprogram/storetambahartikel',[DinasController::class, 'storetambahartikel'])->name('dinas.storetambahartikel');
    Route::post('/dinas/informasiprogram/storeeditartikel',[DinasController::class, 'storeeditartikel'])->name('dinas.storeeditartikel');
    
    //informasiprogram-program
    Route::get('/dinas/informasiprogram/program',[DinasController::class, 'program'])->name('dinas.program');
    Route::get('/dinas/informasiprogram/lihatprogram',[DinasController::class, 'lihatprogram'])->name('dinas.lihatprogram');
    Route::get('/dinas/informasiprogram/tambahprogram',[DinasController::class, 'tambahprogram'])->name('dinas.tambahprogram');
    Route::get('/dinas/informasiprogram/editprogram',[DinasController::class, 'editprogram'])->name('dinas.editprogram');
    Route::post('/dinas/informasiprogram/storetambahprogram',[DinasController::class, 'storetambahprogram'])->name('dinas.storetambahprogram');
    Route::post('/dinas/informasiprogram/storeeditprogram',[DinasController::class, 'storeeditprogram'])->name('dinas.storeeditprogram');

    //layanan
    Route::get('/dinas/layanan', [DinasController::class, 'layanan'])->name('dinas.layanan');
    Route::get('/dinas/tambahlayanan', [DinasController::class, 'tambahlayanan'])->name('dinas.tambahlayanan');
    Route::post('/dinas/storetambahlayanan', [DinasController::class, 'storetambahlayanan'])->name('dinas.storetambahlayanan');


    
    
});

Route::middleware(['role:2'])->group(function () {
    //dashboard
    Route::get('/dokter/dashboard', [DokterController::class, 'index'])->name('dokter.dashboard');

    //profil
    Route::get('/dokter/profil', [DokterController::class, 'profil'])->name('dokter.profil');
    Route::post('/dokter/profil/save', [DokterController::class, 'saveprofil'])->name('dokter.profil.save');

    //konsultasi
    Route::get('/dokter/konsultasi', [DokterController::class, 'konsultasi'])->name('dokter.konsultasi');
    Route::post('/dokter/konsultasi', [ChatController::class,'saveMessage'])->name('dokter.chat.save');
    Route::get('/dokter/konsultasi/load/{roomId}', [ChatController::class, 'loadMessage'])->name('dokter.chat.load');
    Route::post('/dokter/konsultasi/room', [RoomController::class,'create'])->name('dokter.room.create');

    //informasiprogram
    Route::get('/dokter/informasiprogram', [DokterController::class, 'informasiprogram'])->name('dokter.informasiprogram');
    
    //informasiprogram-artikel
    Route::get('/dokter/informasiprogram/artikel',[DokterController::class, 'artikel'])->name('dokter.artikel');
    Route::get('/dokter/informasiprogram/lihatartikel',[DokterController::class, 'lihatartikel'])->name('dokter.lihatartikel');
    Route::get('/dokter/informasiprogram/tambahartikel',[DokterController::class, 'tambahartikel'])->name('dokter.tambahartikel');
    Route::get('/dokter/informasiprogram/editartikel',[DokterController::class, 'editartikel'])->name('dokter.editartikel');
    Route::get('/dokter/informasiprogram/tambahartikel',[DokterController::class, 'tambahartikel'])->name('dokter.tambahartikel');
    Route::post('/dokter/informasiprogram/storetambahartikel',[DokterController::class, 'storetambahartikel'])->name('dokter.storetambahartikel');
    Route::post('/dokter/informasiprogram/storeeditartikel',[DokterController::class, 'storeeditartikel'])->name('dokter.storeeditartikel');

    //informasiprogram-program
    Route::get('/dokter/informasiprogram/program',[DokterController::class, 'program'])->name('dokter.program');
    Route::get('/dokter/informasiprogram/lihatprogram',[DokterController::class, 'lihatprogram'])->name('dokter.lihatprogram');

    
});

Route::middleware(['role:3'])->group(function () {

    Route::get('/peternak/dashboard', [PeternakController::class, 'index'])->name('peternak.dashboard');
    Route::get('/peternak/profil', [PeternakController::class, 'profil'])->name('peternak.profil');
    Route::post('/peternak/profil/save', [PeternakController::class, 'saveprofil'])->name('peternak.profil.save');
    
    Route::get('/peternak/konsultasi', [PeternakController::class, 'konsultasi'])->name('peternak.konsultasi');
    Route::post('/peternak/konsultasi', [ChatController::class,'saveMessage'])->name('chat.save');
    Route::get('/peternak/konsultasi/load/{roomId}', [ChatController::class, 'loadMessage'])->name('chat.load');
    Route::post('/peternak/konsultasi/room', [RoomController::class,'create'])->name('room.create');

    //informasiprogram
    Route::get('/peternak/informasiprogram', [PeternakController::class, 'informasiprogram'])->name('peternak.informasiprogram');
    
    //informasiprogram-artikel
    Route::get('/peternak/informasiprogram/artikel',[PeternakController::class, 'artikel'])->name('peternak.artikel');
    Route::get('/peternak/informasiprogram/lihatartikel',[PeternakController::class, 'lihatartikel'])->name('peternak.lihatartikel');

    //informasiprogram-program
    Route::get('/peternak/informasiprogram/program',[PeternakController::class, 'program'])->name('peternak.program');
    Route::get('/peternak/informasiprogram/lihatprogram',[PeternakController::class, 'lihatprogram'])->name('peternak.lihatprogram');

    //layanan
    Route::get('/peternak/layanan', [PeternakController::class, 'layanan'])->name('dinas.layanan');
    Route::get('/peternak/tambahlayanan', [PeternakController::class, 'tambahlayanan'])->name('dinas.tambahlayanan');



});