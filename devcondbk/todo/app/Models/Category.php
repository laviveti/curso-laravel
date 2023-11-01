<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  use HasFactory;

  protected $fillable = [
    'title',
    'color',
    'user_id'
  ];

  protected $hidden = [ // TODO: apagar hidden se for inútil 
    'user_id'
  ];

  function user()
  {
    return $this->belongsTo(User::class);
  }

  function tasks()
  {
    return $this->hasMany(Task::class);
  }
}
