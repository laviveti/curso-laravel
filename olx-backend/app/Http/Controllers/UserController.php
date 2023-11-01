<?php

namespace App\Http\Controllers;

use App\Http\Middleware\VerifyCsrfToken;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function signup(CreateUserRequest $request): JsonResponse
  {
    $data = $request->only(['name', 'email', 'password', 'state_id']);
    $user = User::create($data);
    $response = [
      'error' => '',
      'user' => $user
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
