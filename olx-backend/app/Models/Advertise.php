<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
  use HasFactory;
  protected $fillable = [
    'title',
    'price',
    'is_negotiable',
    'description',
    'user_id',
    'category_id',
    'state_id'
  ];
}
