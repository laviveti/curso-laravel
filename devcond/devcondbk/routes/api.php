<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BilletController;
use App\Http\Controllers\DocController;
use App\Http\Controllers\LostAndFoundController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WallController;
use App\Http\Controllers\WarningController;

Route::get('/ping', function () {
  return ['pong' => true];
});

Route::get('/401', [AuthController::class, 'unauthorized'])->name('login');

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);

Route::middleware('auth:api')->group(function () {
  Route::post('/auth/validate', [AuthController::class, 'validateToken']);
  Route::post('/auth/logout', [AuthController::class, 'logout']);
  // Mural de avisos
  Route::get('/walls', [WallController::class, 'getMyWarnings']);
  Route::post('/wall/{id}/like', [WallController::class, 'like']);
  // Documentos
  Route::get('/docs', [DocController::class, 'getAll']);
  // Livro de ocorrências
  Route::get('/warnings', [WarningController::class, 'getMyWarnings']);
  Route::post('/warning', [WarningController::class, 'setWarning']);
  Route::post('/warning/file', [WarningController::class, 'addWarningFile']);
  // Boletos
  Route::get('/billets', [BilletController::class, 'getAll']);
  // Achados e perdidos
  Route::get('/lost-and-found', [LostAndFoundController::class, 'getAll']);
  Route::post('/lost-and-found', [LostAndFoundController::class, 'insert']);
  Route::put('/lost-and-found/{id}', [LostAndFoundController::class, 'update']);
  // Unidade
  Route::get('/unit/{id}', [UnitController::class, 'getInfo']);
  Route::post('/unit/{id}/add-person', [UnitController::class, 'addPerson']);
  Route::post('/unit/{id}/add-vehicle', [UnitController::class, 'addVehicle']);
  Route::post('/unit/{id}/add-pet', [UnitController::class, 'addPet']);
  Route::post('/unit/{id}/remove-person', [UnitController::class, 'removePerson']);
  Route::post('/unit/{id}/remove-vehicle', [UnitController::class, 'removeVehicle']);
  Route::post('/unit/{id}/remove-pet', [UnitController::class, 'removePet']);
  // Reservas
  Route::get('/reservations', [ReservationController::class, 'getReservations']);
  Route::get('/reservation/{id}/disabled-dates', [ReservationController::class, 'getDisabledDates']);
  Route::get('/reservation/{id}/times', [ReservationController::class, 'getTimes']);
  Route::get('/my-reservations', [ReservationController::class, 'getMyReservations']);
  Route::post('/my-reservation/{id}', [ReservationController::class, 'setMyReservation']);
  Route::delete('/my-reservation/{id}', [ReservationController::class, 'delMyReservation']);
});
