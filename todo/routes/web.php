<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/task/new', [TaskController::class, 'create'])->name('tasks.create');
Route::get('/task/edit/{id}', [TaskController::class, 'create'])->name('tasks.edit');
Route::get('/task/{id}', [TaskController::class, 'create'])->name('tasks.view');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
