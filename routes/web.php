<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KycController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('themes.home');
})->name('home');

// Client
Route::get('/logout', [LoginController::class, 'logout'])->name('home.logout');
Route::middleware('guest')->prefix('home')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('home.login');
    Route::post('/login', [LoginController::class, 'login'])->name('homelogin.login');
    Route::get('/register', [RegisterController::class, 'register'])->name('home.register');
    Route::post('/register', [RegisterController::class, 'hanldeRegister'])->name('home.hanldeRegister');
});

Route::prefix('kyc')->group(function () {
    Route::get('/', function () { return view('themes.kyc.kycform'); })->name('kyc.form');
    Route::post('verify/{id}', [KycController::class, 'verify'])->name('kyc.submit');
});





// Admin
Route::middleware('checkAdmin')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware('guest:admin')->prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'formlogin'])->name('form.login');
    Route::post('/login', [AdminController::class, 'hanldeLogin'])->name('admin.login');
});