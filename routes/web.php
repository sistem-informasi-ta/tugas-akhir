<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\UserAdmin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::middleware(['auth', UserAdmin::class])->group(function () {

    Route::get('/home', function () {
        return view('user.home-user');
    })->name('home');

    Route::get('/admin-dashboard', function () {
        return view('admin.admin-dashboard');
    })->name('admin.dashboard');

});


Route::get('/', function () {
    if (Auth::check()) {
        return Auth::user()->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('home');
    }
    return view('welcome');
})->middleware(UserAdmin::class)->name('welcome');

Route::post('/', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', UserAdmin::class])->group(function () {
    Route::get('/home', fn() => view('user.home-user'))->name('home');
    Route::get('/admin-dashboard', fn() => view('admin.admin-dashboard'))->name('admin.dashboard');
    Route::get('/admin-orders',[OrderController::class, 'index'])->name('admin.orders');
});

