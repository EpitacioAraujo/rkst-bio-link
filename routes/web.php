<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LinksController;
use App\Http\Controllers\ProfileController;
use App\Models\Links;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware('guest')->group(function() {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});


Route::middleware('auth')->group(function() {
    Route::get('/logout', LogoutController::class)->name('logout');

    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::middleware('can:interact,App/Models/Links')->group(function() {
        Route::get('/links', [LinksController::class, 'create'])->name('links.create');
        Route::post('/links', [LinksController::class, 'store']);

        Route::get('/links/{link}', [LinksController::class, 'edit'])->name('links.update');
        Route::put('/links/{link}', [LinksController::class, 'update']);

        Route::patch('/links/{link}/moveUp', [LinksController::class, 'moveUp'])->name('links.moveUp');
        Route::patch('/links/{link}/moveDown', [LinksController::class, 'moveDown'])->name('links.moveDown');

        Route::delete('/links/{link}', [LinksController::class, 'destroy'])->name('links.destroy');
    });

    Route::get('/me', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/me', [ProfileController::class, 'update']);
});
