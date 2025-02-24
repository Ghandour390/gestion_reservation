<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\ReservationController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('salles')->name('salles.')->group(function () {
    Route::get('/', [SalleController::class, 'index'])->name('index');
    Route::get('/create', [SalleController::class, 'create'])->name('create');
    Route::post('/', [SalleController::class, 'store'])->name('store');
    Route::get('/{salle}', [SalleController::class, 'show'])->name('show');
    Route::get('/{salle}/edit', [SalleController::class, 'edit'])->name('edit');
    Route::put('/{salle}', [SalleController::class, 'update'])->name('update');
    Route::delete('/{salle}', [SalleController::class, 'destroy'])->name('destroy');
});

Route::prefix('reservations')->name('reservations.')->group(function () {
    Route::get('/', [ReservationController::class, 'index'])->name('index');
    Route::get('/create', [ReservationController::class, 'create'])->name('create');
    Route::post('/', [ReservationController::class, 'store'])->name('store');
    Route::get('/{reservation}', [ReservationController::class, 'show'])->name('show');
    Route::get('/{reservation}/edit', [ReservationController::class, 'edit'])->name('edit');
    Route::put('/{reservation}', [ReservationController::class, 'update'])->name('update');
    Route::delete('/{reservation}', [ReservationController::class, 'destroy'])->name('destroy');
});

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/', [UserController::class, 'store'])->name('store');
    Route::get('/{user}', [UserController::class, 'show'])->name('show');
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
    Route::put('/{user}', [UserController::class, 'update'])->name('update');
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
});

Route::get('/showing', [UserController::class, 'showing'])->name('users.showing');
