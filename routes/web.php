<?php

use App\Http\Controllers\AdminKategoriController;
use App\Models\Kategori;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\DasborPertanyaanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('beranda', ['judul' => 'Hexa Property']);
});

Route::get('/toko', function () {
    return view('toko', ['judul' => 'Hexa Property | Toko']);
});

Route::get('/pertanyaan', [PertanyaanController::class, 'index']);

Route::get('/tentang', function () {
    return view('tentang', ['judul' => 'Hexa Property | Tentang']);
});

Route::get('/kategori', function () {
    return view('daftar_ktg', [
        'judul' => "Daftar Kategori",
        'kategori' => Kategori::all()
    ]);
});

Route::get('/masuk', [MasukController::class, 'index'])->name('login')->middleware('guest');
Route::post('/masuk', [MasukController::class, 'autentikasi']);
Route::post('/keluar', [MasukController::class, 'keluar']);

Route::get('/registrasi', [RegistrasiController::class, 'index'])->middleware('guest');
Route::post('/registrasi', [RegistrasiController::class, 'simpan']);

Route::get('/dasbor', function () {
    return view('dasbor/index');
})->middleware('auth');

Route::get('/dasbor/pertanyaan/bikinSlug', [DasborPertanyaanController::class, 'bikinSlug'])->middleware('auth');
Route::resource('/dasbor/pertanyaan', DasborPertanyaanController::class)->middleware('auth');

Route::resource('/dasbor/kategori', AdminKategoriController::class)->except('show')->middleware('admin');