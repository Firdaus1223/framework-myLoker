<?php

use App\Models\Pelamar;
use App\Models\Pekerjaan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\PekerjaanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider, and all of them will
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

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/pekerjaan', function () {
        return view('admin.pekerjaan', [
            'pekerjaan' => Pekerjaan::all()
        ]);
    })->name('admin.pekerjaan');

    Route::get('/admin/pelamar', function () {
        return view('admin.pelamar', [
            'pelamar' => Pelamar::all()
        ]);
    })->name('admin.pelamar');

    Route::get('/admin/pesan', function () {
        return view('admin.pesan');
    })->name('admin.pesan');

    Route::controller(PekerjaanController::class) -> group(function (){
        Route::get('/admin/pekerjaan/tambah', [PekerjaanController::class, 'tambah'])->name('admin.add');
        Route::post('/admin/pekerjaan/tambah/action', [PekerjaanController::class, 'store'])->name('admin.store');
        Route::get('/admin/pekerjaan/edit/{id}', [PekerjaanController::class, 'edit'])->name('admin.edit');
        Route::post('/admin/pekerjaan/edit/{id}/action', [PekerjaanController::class, 'update'])->name('admin.update');
        Route::post('/admin/pekerjaan/delete/{id}/action', [PekerjaanController::class, 'delete'])->name('admin.delete');
        Route::get('/admin/pekerjaan/download_excel', [PekerjaanController::class, 'download_excel'])->name('admin.download_excel');
    });

    Route::controller(PelamarController::class) -> group(function (){
        Route::get('/admin/pekerjaan/tambah', [PelamarController::class, 'tambah'])->name('admin.add');
        Route::post('/admin/pekerjaan/tambah/action', [PelamarController::class, 'store'])->name('admin.store');
        Route::get('/admin/pekerjaan/edit/{id}', [PelamarController::class, 'edit'])->name('admin.edit');
        Route::post('/admin/pekerjaan/edit/{id}/action', [PelamarController::class, 'update'])->name('admin.update');
        Route::post('/admin/pekerjaan/delete/{id}/action', [PelamarController::class, 'delete'])->name('admin.delete');
        Route::get('/admin/pekerjaan/download_excel', [PelamarController::class, 'download_excel'])->name('admin.download_excel');
    });


});

// Route to display job data
Route::get('/pekerjaan', function () {
    $pekerjaan = Pekerjaan::all();
    return view('admin.pekerjaan', ['pekerjaan' => $pekerjaan]);
});

// Route to display applicant data
Route::get('/pelamar', function () {
    $pelamar = Pelamar::first();
    $namaPelamar = $pelamar ? $pelamar->nama_pelamar : 'Guest';

    return view('home', ['title' => 'myLoker', 'namaPelamar' => $namaPelamar]);
})->name('pelamar.home');

Route::get('/pekerjaan/{id}', [PekerjaanController::class, 'show'])->name('pekerjaan.show');


