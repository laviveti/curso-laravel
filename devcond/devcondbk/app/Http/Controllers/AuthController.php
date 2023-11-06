<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function unauthorized(): JsonResponse
  {
    return response()->json([
      'error' => 'Não autorizado'
    ], 401);
  }

  private function validateRequest(Request $request, array $rules)
  {
    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return $validator->errors()->first();
    }

    return null;
  }
  private function createToken(array $credentials)
  {
    $token = auth()->attempt($credentials);

    if (!$token) {
      return null;
    }

    return $token;
  }
  private function getUnitProperties(Authenticatable $user)
  {
    return Unit::select(['id', 'name'])
      ->where('id_owner', $user['id'])
      ->get();
  }

  public function register(Request $request)
  {
    $array = ['error' => ''];

    $error = $this->validateRequest($request, [
      'name' => 'required',
      'email' => 'required|email|unique:users,email',
      'cpf' => 'required|digits:11|unique:users,cpf',
      'password' => 'required',
      'password_confirm' => 'required|same:password'
    ]);

    if (!$error) {
      $name = $request->input('name');
      $email = $request->input('email');
      $cpf = $request->input('cpf');
      $password = $request->input('password');

      $hash = password_hash($password, PASSWORD_DEFAULT);

      $newUser = new User();
      $newUser->name = $name;
      $newUser->email = $email;
      $newUser->cpf = $cpf;
      $newUser->password = $hash;
      $newUser->save();

      $token = $this->createToken([
        'cpf' => $cpf,
        'password' => $password
      ]);

      if (!$token) {
        $array['error'] = 'Ocorreu um erro.';
        return $array;
      }

      $array['token'] = $token;

      $user = auth()->user();
      $array['user'] = $user;

      $properties = $this->getUnitProperties($user);

      $array['user']['properties'] = $properties;


    } else {
      $array['error'] = $error;
    }

    return $array;
  }
  public function login(Request $request)
  {
    $array = ['error' => ''];

    $error = $this->validateRequest($request, [
      'cpf' => 'required|digits:11',
      'password' => 'required'
    ]);

    if (!$error) {
      $cpf = $request->input('cpf');
      $password = $request->input('password');

      $token = $this->createToken([
        'cpf' => $cpf,
        'password' => $password
      ]);

      if (!$token) {
        $array['error'] = 'CPF e/ou senha estão incorretos.';
        return $array;
      }

      $array['token'] = $token;

      $user = auth()->user();
      $array['user'] = $user;

      $properties = $this->getUnitProperties($user);

      $array['user']['properties'] = $properties;

    } else {
      $array['errors'] = $error;
      return $array;
    }

    return $array;
  }
  public function validateToken()
  {
    $array = ['error' => ''];

    $user = auth()->user();
    $array['user'] = $user;

    $properties = $this->getUnitProperties($user);
    $array['user']['properties'] = $properties;


    return $array;
  }

  public function logout()
  {
    $array['error'] = '';
    auth()->logout();
    return $array;
  }
}
