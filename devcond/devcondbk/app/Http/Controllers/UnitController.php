<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\UnitPeople;
use App\Models\UnitPet;
use App\Models\UnitVehicle;
use Illuminate\Http\Request;

class UnitController extends Controller
{
  public function getInfo($id)
  {
    $array = ['error' => ''];

    $unit = Unit::find($id);
    if ($unit) {
      $people = UnitPeople::where('id_unit', $id)->get();
      $vehicles = UnitVehicle::where('id_unit', $id)->get();
      $pets = UnitPet::where('id_unit', $id)->get();

      foreach ($people as $perKey => $perValue) {
        $people[$perKey]['birthdate'] = date('d/m/Y', strtotime($perValue['birthdate']));
      }

      $array['people'] = $people;
      $array['vehicles'] = $vehicles;
      $array['pets'] = $pets;
    } else {
      $array['error'] = 'Propriedade inexistente';
      return $array;
    }

    return $array;
  }
}
