<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Um usuário, inicialmente, tem um endereço.
Route::get('/users/{id}', [UserController::class, 'findOne']);
Route::get('/users', [UserController::class, 'index']);

Route::get('/addresses/{id}', [AddressController::class, 'findOne']);
Route::get('/addresses', [AddressController::class, 'index']);
