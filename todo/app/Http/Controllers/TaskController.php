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
    $id = $request->id;
    $task = Task::find($id);

    if (!$task) {
      return redirect(route('home'));
    }

    $categories = Category::all();
    $data['categories'] = $categories;
    $data['task'] = $task;

    return view('tasks.edit', $data);
  }

  public function edit_action(Request $request)
  {
    $requestData = $request->only(['title', 'due_date', 'category_id', 'description']);
    $task = Task::find($request->id);

    $requestData['is_done'] = $request->is_done ? true : false;

    if (!$task) {
      return 'Erro: Tarefa não existente';
    }

    $task->update($requestData);
    $task->save();
    return redirect(route('home'));
  }

  public function delete(Request $request)
  {
    $id = $request->id;
    $task = Task::find($id);
    if ($task) {
      $task->delete();
    }
    return redirect(route('home'));
  }
}
