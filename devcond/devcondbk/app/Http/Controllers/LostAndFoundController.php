<?php

namespace App\Http\Controllers;

use App\Models\LostAndFound;
use Illuminate\Http\Request;

class LostAndFoundController extends Controller
{
  public function getAll()
  {
    $array = ['error' => ''];

    $lost = LostAndFound::where('status', 'LOST')
      ->orderBy('date_created', 'DESC')
      ->orderBy('id', 'DESC')
      ->get();

    $recovered = LostAndFound::where('status', 'RECOVERED')
      ->orderBy('date_created', 'DESC')
      ->orderBy('id', 'DESC')
      ->get();

    foreach ($lost as $lostKey => $lostValue) {
      $lost[$lostKey]['date_created'] = date('d/m/Y', strtotime($lostValue['date_created']));
      $lost[$lostKey]['photo'] = asset('storage/', $lostValue['photo']);
    }

    foreach ($recovered as $recKey => $recValue) {
      $lost[$recKey]['date_created'] = date('d/m/Y', strtotime($recValue['date_created']));
      $lost[$recKey]['photo'] = asset('storage/', $recValue['photo']);
    }

    $array['lost'] = $lost;
    $array['recovered'] = $recovered;

    return $array;
  }
}
