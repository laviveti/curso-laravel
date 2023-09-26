<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
  public function index(Request $request)
  {
  }

  public function create(Request $request)
  {
    $categories = Category::all();
    $tasks = Task::all();

    $data = [];
    $data['categories'] = $categories;
    $data['tasks'] = $tasks;
    return view('tasks.create', $data);
  }

  public function edit(Request $request)
  {
    return view('tasks.edit');
  }

  public function delete(Request $request)
  { // Delete and redirect to home
    return redirect(route('home'));
  }
}
