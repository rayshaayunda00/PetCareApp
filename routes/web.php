<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\PenitipanController;
use App\Http\Controllers\PublicLayananController;
use App\Http\Controllers\VaccinationController;
use App\Http\Controllers\CheckupController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OwnerController;
use App\Http\Middleware\AdminMiddleware;

/*
|--------------------------------------------------------------------------
| Halaman Publik
|--------------------------------------------------------------------------
*/
Route::get('/', [PublicController::class, 'index'])->name('home');

Route::get('/layanan', [PublicLayananController::class, 'index'])->name('layanan.index');
Route::get('/layanan/{id}', [PublicLayananController::class, 'show'])->name('layanan.show');

Route::get('/penitipan-form', [PenitipanController::class, 'formPublic'])->name('penitipan.form');
Route::post('/penitipan-form', [PenitipanController::class, 'submitPublic'])->name('penitipan.submit');

Route::get('/vaksinasi', [VaccinationController::class, 'form'])->name('vaccination.form');
Route::post('/vaksinasi', [VaccinationController::class, 'submit'])->name('vaccination.submit');

// ✅ FORM CHECKUP bisa diakses publik tanpa login, dan tetap di halaman form setelah submit
Route::get('/checkup', [CheckupController::class, 'form'])->name('checkup.form');
Route::post('/checkup', [CheckupController::class, 'submit'])->name('checkup.submit');

Route::resource('owners', OwnerController::class);


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'formLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');


/*
|--------------------------------------------------------------------------
| Admin (Khusus Admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    // CRUD Penitipan
    Route::get('/admin/penitipan', [PenitipanController::class, 'index'])->name('penitipan.index');
    Route::get('/admin/penitipan/create', [PenitipanController::class, 'create'])->name('penitipan.create');
    Route::post('/admin/penitipan', [PenitipanController::class, 'store'])->name('penitipan.store');
    Route::get('/admin/penitipan/{id}', [PenitipanController::class, 'show'])->name('penitipan.show');
    Route::get('/admin/penitipan/{id}/edit', [PenitipanController::class, 'edit'])->name('penitipan.edit');
    Route::put('/admin/penitipan/{id}', [PenitipanController::class, 'update'])->name('penitipan.update');
    Route::delete('/admin/penitipan/{id}', [PenitipanController::class, 'destroy'])->name('penitipan.destroy');

    // CRUD Vaksinasi
    Route::get('/admin/vaccination', [VaccinationController::class, 'index'])->name('vaccination.index');
    Route::get('/admin/vaccination/create', [VaccinationController::class, 'create'])->name('vaccination.create');
    Route::post('/admin/vaccination', [VaccinationController::class, 'store'])->name('vaccination.store');
    Route::get('/admin/vaccination/{id}', [VaccinationController::class, 'show'])->name('vaccination.show');
    Route::get('/admin/vaccination/{id}/edit', [VaccinationController::class, 'edit'])->name('vaccination.edit');
    Route::put('/admin/vaccination/{id}', [VaccinationController::class, 'update'])->name('vaccination.update');
    Route::delete('/admin/vaccination/{id}', [VaccinationController::class, 'destroy'])->name('vaccination.destroy');

    // ✅ Admin bisa lihat & hapus data checkup
    Route::get('/admin/checkup', [CheckupController::class, 'index'])->name('checkup.index');
    Route::delete('/admin/checkup/{id}', [CheckupController::class, 'destroy'])->name('checkup.destroy');
});


/*
|--------------------------------------------------------------------------
| User Biasa (Login tanpa Role Admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/user-dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    // ❌ Dihapus: checkup index untuk user biasa
    // Route::get('/checkup-list', [CheckupController::class, 'index'])->name('checkup.index');
});
