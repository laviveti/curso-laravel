<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateUserAndAddressSeed extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run()
  {
    DB::table('users')->insert([
      'name' => 'Alessandro Kobs',
      'email' =>  'kobs@suporteb7web.com.br',
      'password' => Hash::make('1234'),
    ]);

    DB::table('addresses')->insert([
      'address' => 'Rua dos Bobos, nº 0'
    ]);
  }
}
