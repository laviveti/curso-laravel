<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
  public function index(Request $request)
  {
    $invoices = Invoice::all();

    return $invoices;
  }

  public function findOne(Request $request)
  {
    $invoice = Invoice::find($request->id);

    if ($invoice === null) {
      return response()->json(['message' => 'Invoice not found'], 404);
    }

    $invoice['user'] = $invoice->user;
    $invoice['address'] = $invoice->address;

    return $invoice;
  }

  public function create(Request $request)
  {
    $data = $request->only([
      'description',
      'value',
      'address_id',
      'user_id'
    ]);

    $invoice = Invoice::create($data);

    return response()->json($invoice, 201);
  }
}
