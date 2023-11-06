<?php

namespace App\Http\Controllers;

use App\Models\Doc;
use Illuminate\Http\Request;

class DocController extends Controller
{
  public function getAll()
  {
    $array = ['error' => '', 'list' => []];

    $docs = Doc::all();

    foreach ($docs as $docKey => $docValue) {
      $docs[$docKey]['file_url'] = asset('storage/' . $docValue['file_url']);
    }

    $array['list'] = $docs;

    return $array;
  }
}
