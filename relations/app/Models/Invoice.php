<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
  public $table = 'invoices';

  protected $fillable = [
    'description',
    'value',
    'address_id',
    'user_id',
  ];

  public function address()
  {
    return $this->hasOne(Address::class, 'id', 'address_id');
  }

  use HasFactory;
}
