<?php

use Illuminate\Support\Facades\Route;
use App\Models\Pekerjaan;
use App\Models\Pelamar;

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
    return view('home', ["title" => "myLoker"]);
});

// Route untuk menampilkan data pekerjaan
Route::get('/pekerjaan', function () {
    $pekerjaan = Pekerjaan::all();
    return view('pekerjaan.index', ['pekerjaan' => $pekerjaan]);
});

// Route untuk menampilkan data pelamar
Route::get('/', function () {
    $pelamar = Pelamar::first(); // Mengambil data pelamar pertama
    $namaPelamar = $pelamar ? $pelamar->nama_pelamar : ''; // Mengambil nama pelamar

    return view('home', ['title' => 'myLoker', 'namaPelamar' => $namaPelamar]);
});

Route::get('/pekerjaan/{id}', 'PekerjaanController@show')->name('pekerjaan.show');

