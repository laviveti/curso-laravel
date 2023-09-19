<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
  public function index(Request $request) {
    $invoices = Invoice::all();
    return $invoices;
  }

  public function findOne(Request $request) {
    $invoice = Invoice::find($request->id);
    if($invoice === null) {
      return response()->json(['message' => 'Invoice not found'], 404);
    }
    return $invoice;
  }

  public function create(Request $request) {
    $rawData = $request->only([
      'description',
      'value',
      'address_id',
      'user_id'
    ]);

    $invoice = Invoice::create([
      'description' => $rawData['description'],
      'value' => $rawData['value'],
      'address_id' => $rawData['address_id'],
      'user_id' => $rawData['user_id']
    ]);

    return response()->json($invoice, 201);
  }
}
