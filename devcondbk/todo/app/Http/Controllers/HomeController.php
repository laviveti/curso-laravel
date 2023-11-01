<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  public function index(Request $request)
  {
    $filteredDate = $request->date;

    if (!$request->date) {
      $filteredDate = date('Y-m-d');
    }
    $carbonDate = Carbon::createFromDate($filteredDate); // today = (27)

    $data['tasks'] = Task::whereDate('due_date', date('Y-m-d'))->get();
    $data['authUser'] = Auth::user();
    $data['tasks_count'] = $data['tasks']->count();
    $data['undone_tasks_count'] = $data['tasks']->where('is_done', false)->count();

    // Dividindo a data em parte
    $dateParts = explode(' ', $carbonDate->translatedFormat('d \d\e M'));
    // Convertendo a primeira letra do mês para maiúscula
    $dateParts[2] = ucfirst($dateParts[2]);
    // Juntando as partes de volta
    $data['date_as_string'] = implode(' ', $dateParts); // '00 de Mês'

    $data['date_prev_button'] = $carbonDate->addDay(-1)->format('Y-m-d'); // today = (26)
    $data['date_next_button'] = $carbonDate->addDay(2)->format('Y-m-d');  // today = (28)


    return view('home', $data);
  }
}
