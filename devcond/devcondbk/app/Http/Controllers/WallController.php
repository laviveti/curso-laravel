<?php

namespace App\Http\Controllers;

use App\Models\Wall;
use App\Models\WallLike;
use Illuminate\Http\Request;

class WallController extends Controller
{
  public function getAll()
  {
    $array = ['error' => '', 'list' => []];

    $user = auth()->user();

    $walls = Wall::all();

    foreach ($walls as $wallKey => $wallValue) {
      $walls[$wallKey]['likes'] = 0;
      $walls[$wallKey]['liked'] = false;

      $likes = WallLike::where('id_wall', $wallValue['id'])->count();
      $walls[$wallKey]['likes'] = $likes;

      $myLike = WallLike::where('id_wall', $wallValue['id'])
        ->where('id_user', $user['id'])
        ->count();

      if ($myLike > 0) {
        $walls[$wallKey]['liked'] = true;
      }
    }

    $array['list'] = $walls;

    return $array;
  }

  public function like($id)
  {
    $array = ['error' => ''];

    $user = auth()->user();

    $myLike = WallLike::where('id_wall', $id)->where('id_user', $user['id'])
      ->count();

    if ($myLike > 0) {
      // remove like
      WallLike::where('id_wall', $id)->where('id_user', $user['id'])
        ->delete();
      $array['liked'] = false;
    } else {
      // add like
      $newLike = new WallLike();
      $newLike->id_wall = $id;
      $newLike->id_user = $user['id'];
      $newLike->save();
      $array['liked'] = true;
    }

    $array['likes'] = WallLike::where('id_wall', $id)->count();

    return $array;
  }
}
