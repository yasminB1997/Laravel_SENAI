<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SetorApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('Filmes',[SetorApiController::class, 'listarApi']);
Route::post('Filme/add',[SetorApiController::class, 'addApi']);
Route::put('Filme/atualizar{id}',[SetorApiController::class, 'updateApi']);
Route::delete('Filme/deletar{id}',[SetorApiController::class, 'deletarApi']);




Route::get('Autores',[SetorApiController::class, 'listarApi']);
Route::post('autor/add',[SetorApiController::class, 'addApi']);
Route::put('autor/atualizar{id}',[SetorApiController::class, 'updateApi']);
Route::delete('autor/deletar{id}',[SetorApiController::class, 'deletarApi']);