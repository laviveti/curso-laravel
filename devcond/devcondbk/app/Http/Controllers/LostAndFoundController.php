<?php

namespace App\Http\Controllers;

use App\Models\LostAndFound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
      $lost[$lostKey]['photo'] = asset('storage/' . $lostValue['photo']);
    }

    foreach ($recovered as $recKey => $recValue) {
      $recovered[$recKey]['date_created'] = date('d/m/Y', strtotime($recValue['date_created']));
      $recovered[$recKey]['photo'] = asset('storage/' . $recValue['photo']);
    }

    $array['lost'] = $lost;
    $array['recovered'] = $recovered;

    return $array;
  }

  public function insert(Request $request)
  {
    $array = ['error' => ''];

    $validator = Validator::make($request->all(), [
      'description' => 'required',
      'where' => 'required',
      'photo' => 'required|file|mimes:png,jpg',
    ]);

    if (!$validator->fails()) {
      $description = $request->input('description');
      $where = $request->input('where');
      $file = $request->file('photo')->store('public');
      $file = explode('public/', $file);
      $photo = $file[1];

      $newLost = new LostAndFound();
      $newLost->status = 'LOST';
      $newLost->photo = $photo;
      $newLost->description = $description;
      $newLost->where = $where;
      $newLost->date_created = date('Y-m-d');
      $newLost->save();
    } else {
      $array['error'] = $validator->errors()->first();
      return $array;
    }
    return $array;
  }
}
