<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

Route::get('/ping', function (): JsonResponse {
  return response()->json(['pong' => true]);
});

// Utils routes
// [x] - /ping

// Auth routes
// [] - /user/signin
// [] - /user/signup
// [] - /user/me

// Config routes
// [] - /states
// [] - /categories

// Advertises routes
// [] - /ad/list
// [] - /ad/:id
// [] - /ad/add
// [] - /ad/:id(PUT)
// [] - /ad/:id(DELETE)
// [] - /ad/:id/:image(DELETE)
