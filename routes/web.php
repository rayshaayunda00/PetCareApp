<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\PenitipanController;
use App\Http\Controllers\PublicLayananController;
use App\Http\Controllers\VaccinationController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\CheckupController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ArticleController;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\OnlyAdminMiddleware;

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
Route::get('/checkup', [CheckupController::class, 'form'])->name('checkup.form');
Route::post('/checkup', [CheckupController::class, 'submit'])->name('checkup.submit');
Route::resource('owners', OwnerController::class);

/*
|--------------------------------------------------------------------------
| Artikel Publik (Tanpa Login)
|--------------------------------------------------------------------------
*/
Route::get('/artikel', [ArticleController::class, 'indexPublic'])->name('articles.public.index');
Route::get('/artikel/{slug}', [ArticleController::class, 'show'])->name('articles.public.show');

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
| Admin (Role: admin & admin_super)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    // CRUD Penitipan
    Route::resource('/penitipan', PenitipanController::class);

    // CRUD Vaksinasi
    Route::resource('/vaccination', VaccinationController::class);

    // CRUD Checkup
    Route::get('/checkup', [CheckupController::class, 'index'])->name('checkup.index');
    Route::delete('/checkup/{id}', [CheckupController::class, 'destroy'])->name('checkup.destroy');

    // CRUD Artikel (Hanya Admin & Admin Super)
    Route::get('/articles', [ArticleController::class, 'index'])->name('admin.articles.index');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('admin.articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('admin.articles.store');
    Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('admin.articles.show'); // Detail
    Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('admin.articles.edit');
    Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('admin.articles.update');
    Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('admin.articles.destroy');
});

/*
|--------------------------------------------------------------------------
| Dokter CRUD (Khusus admin biasa saja)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', OnlyAdminMiddleware::class])->group(function () {
    Route::resource('/admin/dokter', DoctorController::class)->names([
        'index' => 'doctors.index',
        'create' => 'doctors.create',
        'store' => 'doctors.store',
        'show' => 'doctors.show',
        'edit' => 'doctors.edit',
        'update' => 'doctors.update',
        'destroy' => 'doctors.destroy',
    ]);
});

/*
|--------------------------------------------------------------------------
| User Biasa (Login tanpa role admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/user-dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
});
