<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\AutorController;

Route::get('/', function () {
    return view('welcome');
});

// FILME

Route::get('/filme/listar', [FilmeController::class, 'listar']) -> name('filme.listar');
Route::get('/autor/listar', [FilmeController::class, 'autor']) -> name('autor.listar');

