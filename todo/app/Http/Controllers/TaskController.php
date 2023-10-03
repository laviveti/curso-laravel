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

  public function create_action(Request $request)
  {
    $task = $request->only(['title', 'category_id', 'description', 'due_date']);
    $task['user_id'] = 1;
    $dbTask = Task::create($task);
    return redirect(route('home'));
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
