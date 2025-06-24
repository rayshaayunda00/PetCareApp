<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\PenitipanController;
use App\Http\Controllers\PublicLayananController;
use App\Http\Controllers\VaccinationController;
use App\Http\Controllers\CheckupController;

Route::get('/', [PublicController::class, 'index']); // Home page (view: public/home.blade.php)

// Hapus atau jangan ada ini:
// Route::get('/home', function () { return view('home'); });

Route::resource('owners', OwnerController::class);

Route::get('/layanan', [PublicLayananController::class, 'index'])->name('layanan.index');
Route::get('/layanan/{id}', [PublicLayananController::class, 'show'])->name('layanan.show');

Route::get('/penitipan', [PenitipanController::class, 'form'])->name('penitipan.form');
Route::post('/penitipan', [PenitipanController::class, 'submit'])->name('penitipan.submit');


Route::get('/vaksinasi', [VaccinationController::class, 'form'])->name('vaccination.form');
Route::post('/vaksinasi', [VaccinationController::class, 'submit'])->name('vaccination.submit');



Route::get('/checkup', [CheckupController::class, 'form'])->name('checkup.form');
Route::post('/checkup', [CheckupController::class, 'submit'])->name('checkup.submit');
