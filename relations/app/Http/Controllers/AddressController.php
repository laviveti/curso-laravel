<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
  //
  public function index(Request $request)
  {
    $addresses = Address::all();
    return $addresses;
  }
}
