<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
  use HasFactory;

  protected $fillable = ['code', 'user_id', 'lesson_id'];

  public function lesson()
  {
  	return $this->belongsTo(Lesson::class);
  }

  public function questions()
  {
  	return $this->hasMany(Question::class, 'lesson_id', 'lesson_id');
  }

  public function tests()
  {
  	return $this->hasMany(Test::class);
  }

}
