<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LostAndFound extends Model
{
  use HasFactory;

  public $timestamps = false;
  protected $table = 'lost_and_found';
}
