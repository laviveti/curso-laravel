<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  public function index(Request $request)
  {
    $tasks = Task::all()->take(4);

    /** @var User|null $authUser */
    $authUser = Auth::user();

    if(!$authUser) return redirect()->route('login');

    return view('home', [
      'tasks' => $tasks,
      'authUser' => $authUser
    ]);
  }
}
