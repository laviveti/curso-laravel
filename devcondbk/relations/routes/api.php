<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Um usuário, inicialmente, tem um endereço.
Route::post('/users', [UserController::class, 'create']);
Route::get('/users/{id}', [UserController::class, 'findOne']);
Route::get('/users', [UserController::class, 'index']);

Route::post('/addresses', [AddressController::class, 'create']);
Route::get('/addresses/{id}', [AddressController::class, 'findOne']);
Route::get('/addresses', [AddressController::class, 'index']);

Route::post('/invoices', [InvoiceController::class, 'create']);
Route::get('/invoices/{id}', [InvoiceController::class, 'findOne']);
Route::get('/invoices', [InvoiceController::class, 'index']);
