<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Warning;
use Illuminate\Http\Request;

class WarningController extends Controller
{
  public function getMyWarnings(Request $request)
  {
    $array = ['error' => '', 'list' => []];
    $property = $request->input('property');

    if ($property) {
      $user = auth()->user();
      $unit = Unit::where('id', $property)->where('id_owner', $user['id'])->count();

      if ($unit > 0) {
        $warnings = Warning::where('id_unit', $property)
          ->orderBy('date_created', 'DESC')
          ->orderBy('id', 'DESC')
          ->get();

        foreach ($warnings as $warnKey => $warnValue) {
          $warnings[$warnKey]['date_created'] = date('d/m/Y', strtotime($warnValue['date_created']));
          $photoList = [];
          $photos = explode(',', $warnValue['photos']);
          foreach ($photos as $photo) {
            $photoList[] = asset('storage/' . $photo);
          }
          $warnings[$warnKey]['photos'] = $photoList;
        }

        $array['list'] = $warnings;
      } else {
        $array['error'] = 'Essa unidade não é sua';
      }

    } else {
      $array['error'] = 'A propriedade é necessária';
    }
    return $array;
  }
}
