<?php

use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/email/verify/{id}/{hash}', [VerifycationController::class,'verify'])->middleware(['signed', 'verified'])->name('verification.verify');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::prefix('admin')->middleware(['auth','is.admin'])->group(function () {
    Route::resource('user', App\Http\Controllers\Backend\UserController::class);
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
})->name('admin');
