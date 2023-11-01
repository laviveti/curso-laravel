<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\UserController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

// Utils routes
// [x] - /ping
Route::get('/ping', function (): JsonResponse {
  return response()->json(['pong' => true]);
});

// Auth routes
// [x] - /user/signin
Route::post('/user/signin', [UserController::class, 'signin']);
// [x] - /user/signup
Route::post('/user/signup', [UserController::class, 'signup']);
// [x] - /user/me
Route::post('/user/me', [UserController::class, 'me']);

// Config routes
// [x] - /states
Route::get('/states', [StateController::class, 'index']);
// [x] - /categories
Route::get('/categories', [CategoryController::class, 'index']);

// Advertises routes
// [] - /ad/list
// [] - /ad/:id
// [] - /ad/add
// [] - /ad/:id(PUT)
// [] - /ad/:id(DELETE)
// [] - /ad/:id/:image(DELETE)
