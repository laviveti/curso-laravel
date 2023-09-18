<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Um usuário, inicialmente, tem um endereço.
Route::get('/users', [UserController::class, 'index']);
Route::get('/addresses', [AddressController::class, 'index']);
