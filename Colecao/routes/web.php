<?php

use App\Http\Controllers\ColecaoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\FiguraController;
use App\Http\Controllers\PrateleiraController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Event\Code\Test;


Route::get('/', [UserController::class, 'formLogin'])->name('formLogin');
Route::post('/', [UserController::class, 'login'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('logoff');
    Route::get('/restrita', [UserController::class, 'restrita'])->name('restrita');
    
    Route::prefix('colecoes')->group(function(){
        Route::get('{eLixeira?}', [ColecaoController::class, 'index'])->name('colecoes');
        Route::post('store', [ColecaoController::class, 'store'])->name('colecoes.store');
        Route::get('edit/{colecao}', [ColecaoController::class, 'edit'])->name('colecoes.edit');
        Route::put('update/{colecao}', [ColecaoController::class, 'update'])->name('colecoes.update');
        Route::get('delete/{colecao}', [ColecaoController::class, 'delete'])->name('colecoes.delete');
        Route::get('restore/{colecao}', [ColecaoController::class, 'restore'])->name('colecoes.restore');
    });

    Route::prefix('categorias')->group(function(){
        Route::get('{eLixeira?}', [CategoriaController::class, 'index'])->name('categorias');
        Route::get('delete/{colecao}', [CategoriaController::class, 'delete'])->name('categorias.delete');
        Route::get('restore/{colecao}', [CategoriaController::class, 'restore'])->name('categorias.restore');
    });

    Route::prefix('figuras')->group(function(){
        Route::get('{eLixeira?}', [FiguraController::class, 'index'])->name('figuras');
        Route::get('delete/{colecao}', [FiguraController::class, 'delete'])->name('figuras.delete');
        Route::get('restore/{colecao}', [FiguraController::class, 'restore'])->name('figuras.restore');
    });

    Route::prefix('prateleiras')->group(function(){
        Route::get('{eLixeira?}', [PrateleiraController::class, 'index'])->name('prateleiras');
        Route::get('delete/{colecao}', [PrateleiraController::class, 'delete'])->name('prateleiras.delete');
        Route::get('restore/{colecao}', [PrateleiraController::class, 'restore'])->name('prateleiras.restore');
    });
});