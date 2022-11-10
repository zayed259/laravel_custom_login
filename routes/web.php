<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class, 'index'])->name('index');

// login
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'check'])->name('checklogin');

// register
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'store'])->name('registersave');

// auth middlewear group
Route::middleware(['auth'])->group(function () {
// logout
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// dashboard
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

// reset password
// Route::get('reset-password', [AuthController::class, 'resetPassword'])->name('reset-password');
Route::post('reset-password', [AuthController::class, 'updatePassword'])->name('reset-password');

});

