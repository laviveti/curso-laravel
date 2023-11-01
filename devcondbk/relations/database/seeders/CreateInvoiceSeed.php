<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CreateInvoiceSeed extends Seeder
{
  public function run(): void
  {
    DB::table('invoices')->insert([
      'description' => 'Fatura B7web',
      'value' => 699.90,
      'address_id' => 1,
      'user_id' => 1,
    ]);
  }
}
