<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'index']);


Route::get('/', function () {
    return view('welcome');
});

Route::resource('owners', OwnerController::class);

Route::get('/', function () {
    return view('home');
});


Route::get('/layanan', [PublicLayananController::class, 'index'])->name('layanan.index');
Route::get('/layanan/{id}', [PublicLayananController::class, 'show'])->name('layanan.show');
