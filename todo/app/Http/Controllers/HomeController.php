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
    $authUser = Auth::user();
    $tasks = Task::all()->take(4);
    $dateAsString = '15 de Dez';
    $datePrevButton = '2022-11-14';
    $dateNextButton = '2022-11-16';


    return view('home', [
      'authUser' => $authUser,
      'tasks' => $tasks,
      'dateAsString' => $dateAsString,
      'datePrevButton' => $datePrevButton,
      'dateNextButton' => $dateNextButton
    ]);
  }
}
