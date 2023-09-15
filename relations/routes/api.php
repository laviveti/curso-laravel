<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Um usuário, inicialmente, tem um endereço.
Route::get('/users', [UserController::class, 'index']);

Route::get('/addresses', [AddressController::class, 'index']);
