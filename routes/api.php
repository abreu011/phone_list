<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

// Route::apiResource('/contacts', [ContactController::class]); -> Registra várias rotas de forma abreviada

Route::delete('/contacts/{id}', [ContactController::class, 'destroy']);
Route::put('/contacts/{id}', [ContactController::class, 'update']);
Route::get('/contacts/{id}', [ContactController::class, 'show']);
Route::get('/contacts', [ContactController::class, 'index']);
Route::post('/contacts', [ContactController::class, 'store']);