<?php

namespace App\Http\Controllers;

use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function signup(Request $request): JsonResponse
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
