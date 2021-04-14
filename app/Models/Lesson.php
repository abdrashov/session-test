<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
  use HasFactory;

  protected $fillable = ['user_id', 'title', 'code', 'status'];
  
  public function questions()
  {
    return $this->hasMany(Question::class);
  }
  
  public function user()
  {
  	return $this->belongsTo(User::class);
  }

  public function scopeByActive($query)
  {
    return $query->where('status', true);
  }

}
