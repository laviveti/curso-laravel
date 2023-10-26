<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  public function index(Request $request){
    $filteredDate = $request->date;

    if(!$request->date) {
      $filteredDate = date('Y-m-d');
    }

    $carbonDate = Carbon::createFromDate($filteredDate);

    $data['tasks'] = Task::whereDate('due_date', date('Y-m-d'))->get();
    $data['authUser'] = Auth::user();
    $data['tasks_count'] = $data['tasks']->count();
    $data['undone_tasks_count'] = $data['tasks']->where('is_done', false)->count();
    $data['date_as_string'] = '15 de Dez';
    $data['date_prev_button'] = '2022-11-14';
    $date['date_next_button'] = '2022-11-16';


    return view('home', $data);
    // return view('home', [
    //   'authUser' => $authUser,
    //   'tasks' => $tasks,
    //   'dateAsString' => $dateAsString,
    //   'datePrevButton' => $datePrevButton,
    //   'dateNextButton' => $dateNextButton
    // ]);
  }
}
