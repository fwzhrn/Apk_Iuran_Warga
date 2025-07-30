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
    Route::get('/administrator', [AdminController::class, 'dashboard'])->name('admin.index');
    Route::get('/administrator/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::middleware('warga')->group(function () {
   Route::get('/', function () {
    return view('home');
});
});
