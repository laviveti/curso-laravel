<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  public function index(Request $request)
  {
    return view('login');
  }

  public function login_action(Request $request)
  {

    $validator = $request->validate([
      'email' => ['required', 'email'],
      'password' => 'required|min:6',
    ]);

    $isAuthenticated = Auth::attempt($validator);

    if ($isAuthenticated) return redirect(route('home'));
    return redirect(route('login'));
  }


  public function register(Request $request)
  {
    return view('register');
  }

  public function login_action(Request $request)
  {
    $validator =  $request->validate([
      'email' => 'required|email',
      'password' => 'required|min:6',
    ]);

    dd($validator);
  }

  public function register_action(Request $request)
  {
    $messages = [
      'email.regex' => 'O email deve terminar com .com ou .br',
    ];

    $request->validate([
      'name' => 'required',
      'email' => ['required', 'email', 'unique:users', 'regex:/^.+@.+\\.(com|br)$/'],
      'password' => 'required|min:6|confirmed'
    ], $messages);
    ], $messages);

    $data = $request->only('name', 'email', 'password');

    $data['password']  = Hash::make($data['password']);
    User::create($data);
    return redirect(route('login'));
  }
}
