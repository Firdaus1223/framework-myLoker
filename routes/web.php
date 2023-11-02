<?php

use App\Models\Pelamar;
use App\Models\Pekerjaan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PekerjaanController;


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

Route::get('/login', function () {
    return view('auth.auth');
})->name('login');

Route::post('/login/action', [
    AuthController::class, 'loginAction'
])->name('login.action');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register/action', [
    AuthController::class, 'registerAction'
])->name('register.action');

Route::get('/logout', [
    AuthController::class, 'logout'
])->name('logout');

Route::middleware('auth')->group(function (){
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard')->middleware('auth');

    Route::get('/admin/pekerjaan', function () {
        return view('admin.pekerjaan',[
            'pekerjaan' => Pekerjaan::all()
        ]);
    })->name('admin.pekerjaan')->middleware('auth');

    Route::get('/admin/pelamar', function () {
        return view('admin.pelamar',[
            'pelamar' => Pelamar::all()
        ]);
    })->name('admin.pelamar')->middleware('auth');

    Route::get('/admin/pesan', function () {
        return view('admin.pesan');
    })->name('admin.pesan')->middleware('auth');

    Route::get('/admin/pekerjaan/tambah', 'tambah')->name('admin.add');
    Route::post('/admin/pekerjaan/tambah/action', 'store')->name('admin.store');
    Route::get('/admin/pekerjaan/edit/{id}', 'edit')->name('admin.edit');
    Route::post('/admin/pekerjaan/edit/{id}/action', 'update')->name('admin.update');
    Route::post('/admin/pekerjaan/delete/{id}/action', 'delete')->name('admin.delete');

});

// Route untuk menampilkan data pekerjaan
Route::get('/pekerjaan', function () {
    $pekerjaan = Pekerjaan::all();
    return view('admin.pekerjaan', ['pekerjaan' => $pekerjaan]);
});

// Route untuk menampilkan data pelamar
Route::get('/', function () {
    $pelamar = Pelamar::first(); // Mengambil data pelamar pertama
    $namaPelamar = $pelamar ? $pelamar->nama_pelamar : ''; // Mengambil nama pelamar

    return view('home', ['title' => 'myLoker', 'namaPelamar' => $namaPelamar]);
});

Route::get('/pekerjaan/{id}', 'PekerjaanController@show')->name('pekerjaan.show');

