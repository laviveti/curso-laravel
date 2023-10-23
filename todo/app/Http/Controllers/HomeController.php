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
    $data['tasks'] = Task::whereDate('due_date', date('Y-m-d'))->get();
    $data['authUser'] = Auth::user();
    $data['tasks_count'] = $data['tasks']->count();
    $data['undone_tasks_count'] = $data['tasks']->where('is_done', false)->count();


    return view('home', $data);
  }
}
