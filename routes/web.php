<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/home', function () {
    return view('home');
});
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/admin/login', [AdminController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'adminLogin']);

Route::middleware('admin')->group(function () {
    Route::get('/administrator/data-warga/{id}/edit', [AdminController::class, 'editWarga'])->name('admin.data-warga.edit');
    Route::put('/administrator/data-warga/{id}', [AdminController::class, 'updateWarga'])->name('admin.data-warga.update');
    Route::delete('/administrator/data-warga/{id}', [AdminController::class, 'deleteWarga'])->name('admin.data-warga.delete');
    Route::get('/administrator', [AdminController::class, 'dashboard'])->name('admin.index');
    Route::get('/administrator/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/administrator/data-warga', [AdminController::class, 'dataWarga'])->name('admin.data-warga');
    Route::get('/administrator/data-warga/create', [AdminController::class, 'createWarga'])->name('admin.data-warga.create');
    Route::post('/administrator/data-warga', [AdminController::class, 'storeWarga'])->name('admin.data-warga.store');
    Route::get('/administrator/kategori-iuran', [AdminController::class, 'kategoriIuran'])->name('admin.kategori-iuran');
    Route::get('/administrator/kategori-iuran/create', [AdminController::class, 'createKategori'])->name('admin.kategori-iuran.create');
    Route::post('/administrator/kategori-iuran', [AdminController::class, 'storeKategori'])->name('admin.kategori-iuran.store');
    Route::get('/administrator/kategori-iuran/{id}/edit', [AdminController::class, 'editKategori'])->name('admin.kategori-iuran.edit');
    Route::put('/administrator/kategori-iuran/{id}', [AdminController::class, 'updateKategori'])->name('admin.kategori-iuran.update');
    Route::delete('/administrator/kategori-iuran/{id}', [AdminController::class, 'deleteKategori'])->name('admin.kategori-iuran.delete');
});

Route::middleware('warga')->group(function () {
    Route::get('/', function () {
    return view('home');
    });
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [AuthController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');
});
