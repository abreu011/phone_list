<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/contacts/{id}', [ContactController::class, 'show']);
Route::get('/contacts', [ContactController::class, 'index']);
Route::post('/create', [ContactController::class, 'store']);