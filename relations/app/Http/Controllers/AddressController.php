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

  public function findOne(Request $request)
  {
    $address = Address::find($request->id);
    if ($address === null) {
      return response()->json(['message' => 'Address not found'], 404);
    }
    return $address;
  }
}
