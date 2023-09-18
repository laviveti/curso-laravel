<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  //
  public function index(Request $request)
  {
    $users = User::all();
    return $users;
  }

  public function findOne(Request $request)
  {
    $user = User::find($request->id);
    if ($user === null) {
      return response()->json(['message' => 'User not found'], 404);
    }
    return $user;
  }

  public function create(Request $request)
  {
    $rawData = $request->only(['name', 'email', 'password']);
    $hashedPassword = password_hash($rawData['password'], PASSWORD_DEFAULT);

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => $hashedPassword
    ]);

    return response()->json($user, 201);
  }
}
