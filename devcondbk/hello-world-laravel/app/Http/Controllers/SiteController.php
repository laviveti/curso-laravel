<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
  public function index()
  {
    $people = [
      [
        'image' => 'https://i.pravatar.cc/150?img=' . rand(0, 50),
        'name' => 'Alessandro',
        'age' => '33',
        'birthDate' => '20/01/1990'
      ],
      [
        'image' => 'https://i.pravatar.cc/150?img=' . rand(0, 50),
        'name' => 'Bonieky',
        'age' => '90',
        'birthDate' => '20/01/1933'
      ],
      [
        'image' => 'https://i.pravatar.cc/150?img=' . rand(0, 50),
        'name' => 'Maria',
        'age' => '2',
        'birthDate' => '20/01/2021'
      ],
    ];

    $data['people'] = $people;

    return view('welcome', $data);
  }
  public function includeMethod()
  {
    return view('include');
  }
  public function components()
  {
    return view('components');
  }

  public function layout()
  {
    return view('site');
  }
  public function layout2()
  {
    return view('pagina2');
  }
}
