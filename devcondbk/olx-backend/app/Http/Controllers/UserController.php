<?php

namespace App\Http\Controllers;

use App\Http\Middleware\VerifyCsrfToken;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\SignInRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
  public function signin(SignInRequest $request): JsonResponse
  {
    $data = $request->only(['email', 'password']);

    if (Auth::attempt($data)) {
      /** @var \App\Models\User $user **/
      $user = Auth::user();
      $response = [
        'error' => '',
        'token' => $user->createToken('login_token')->plainTextToken
      ];
      return response()->json($response);
    }

    return response()->json(['error' => 'Usuário ou senha inválidos']);
  }
  public function me(Request $request): JsonResponse
  {
    $user = Auth::user();
    $response = [
      'name' => $user->name,
      'email' => $user->email,
      'state' => $user->state->name,
      'ads' => $user->advertises
    ];
    return response()->json($response);
  }
}
