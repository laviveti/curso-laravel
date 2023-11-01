<?php

namespace App\Http\Controllers;

use App\Http\Middleware\VerifyCsrfToken;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function signup(CreateUserRequest $request): JsonResponse
  {
    return response()->json(['method' => 'signup']);
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
