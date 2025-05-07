<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Event\Code\Test;


Route::get('/', [UserController::class, 'formLogin'])->name('formLogin');
Route::post('/', [UserController::class, 'login'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('logoff');
    Route::get('/restrita', [UserController::class, 'restrita'])->name('restrita');
});