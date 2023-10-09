<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class AuthController extends Controller
{
  public function index(Request $request)
  {
    return view('login');
  }

  public function register(Request $request)
  {
    return view('register');
  }

  public function login_action(Request $request)
  {
    $request->validate([
      'email' => 'required|email',
      'password' => 'required|min:6',
    ]);

    return redirect(route('login'));
  }

  public function register_action(Request $request)
  {
    $messages = [
      'email.regex' => 'O e-mail deve terminar com ".com" ou ".br"',
      'confirmed' => 'Confirmação de senha não corresponde'
    ];

    $request->validate([
      'name' => 'required',
      'email' => ['required', 'email', 'regex:/.*(.com|.br)$/'],
      'password' => 'required|min:6|confirmed'
    ], $messages);

    $data = $request->only('name', 'email', 'password');
    User::create($data);
    return redirect(route('login'));
  }
}
