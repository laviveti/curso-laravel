<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/layout', [SiteController::class, 'layout']);
Route::get('/layout2', [SiteController::class, 'layout2']);

Route::get('/include', [SiteController::class, 'includeMethod']);
Route::get('/components', [SiteController::class, 'components']);
Route::get('/', [SiteController::class, 'index']);
