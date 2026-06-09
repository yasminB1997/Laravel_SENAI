<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndustriaApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('Industria',[IndustriaApiController::class, 'listarApi']);
Route::post('Industria/add',[IndustriaApiController::class, 'addApi']);
Route::put('Industria/atualizar/{id}',[IndustriaApiController::class, 'updateApi']);
Route::delete('/producao/deletar/{id}', [IndustriaApiController::class, 'deletarApi']);

?>