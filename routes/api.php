<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('cliente', [ClienteController::class, 'store']);
Route::get('cliente', [ClienteController::class, 'index']);
Route::get('cliente/{id}', [ClienteController::class, 'findbyId']);
Route::put('cliente/{id}', [ClienteController::class, 'update']);
Route::delete('cliente/{id}', [ClienteController::class, 'delete']);

Route::post('produto', [ProdutoController::class, 'store']);
Route::get('produto', [ProdutoController::class, 'index']);
Route::get('produto/{id}', [ProdutoController::class, 'findbyId']);
Route::put('produto/{id}', [ProdutoController::class, 'update']);
Route::delete('produto/{id}', [ProdutoController::class, 'delete']);

Route::post('venda', [VendaController::class, 'store']);










