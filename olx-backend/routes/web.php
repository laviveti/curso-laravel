<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\StatesController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

// Utils routes
// [x] - /ping
Route::get('/ping', function (): JsonResponse {
  return response()->json(['pong' => true]);
});
// Auth routes
// [] - /user/signin
// [] - /user/signup
// [] - /user/me

// Config routes
// [x] - /states
Route::get('/states', [StatesController::class, 'index']);
// [x] - /categories
Route::get('/categories', [CategoriesController::class, 'index']);

// Advertises routes
// [] - /ad/list
// [] - /ad/:id
// [] - /ad/add
// [] - /ad/:id(PUT)
// [] - /ad/:id(DELETE)
// [] - /ad/:id/:image(DELETE)
