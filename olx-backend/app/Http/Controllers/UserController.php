<?php

namespace App\Http\Controllers;

use App\Http\Middleware\VerifyCsrfToken;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  public function signup(CreateUserRequest $request): JsonResponse
  {
    $data = $request->only(['name', 'email', 'password', 'state_id']);
    $data['password'] = Hash::make($data['password']);
    $user = User::create($data);

    $response = [
      'error' => '',
      'token' => $user->createToken('register_token')->plainTextToken
    ];

    return response()->json($response);
  }
  public function signin(Request $request): JsonResponse
  {
    return response()->json(['method' => 'signin']);
  }
  public function me(Request $request): JsonResponse
  {
    return response()->json(['method' => 'me']);
  }
}
