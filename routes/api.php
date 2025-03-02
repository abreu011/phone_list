<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

// Route::apiResource('/contacts', [ContactController::class]); -> Registra várias rotas de forma abreviada

//Contact Routes
Route::delete('/contacts/{id}', [ContactController::class, 'destroy']);
Route::put('/contacts/{id}', [ContactController::class, 'update']);
Route::get('/contacts/{contact}', [ContactController::class, 'show']);
Route::get('/contacts', [ContactController::class, 'index']);
Route::post('/contacts', [ContactController::class, 'store']);

//Address Routes
Route::get('/contacts/{contact}/addresses', [AddressController::class, 'show']); 
Route::post('/contacts/{contact}/addresses', [AddressController::class, 'store']); 

Route::delete('addresses/{id}', [AddressController::class, 'destroy']); 
Route::put('addresses/{id}', [AddressController::class, 'update']); 
Route::get('/addresses', [AddressController::class, 'index']); 