<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
  use HasFactory;

  protected $fillable = ['code', 'user_id', 'lesson_id', 'status'];

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

  public function getSumSpentTime():int
  {
    $time = 0;
    foreach( $this->tests()->select('spent_time')->get() as $test ){
      $time += $test->spent_time;
    }
    return $time;
  }

  public function getSumRightAnswer():int
  {
    return $this->tests()->whereColumn('user_answer_id', 'right_answer_id')->select('user_answer_id', 'right_answer_id')->count();
  }

  public function getSumWrongAnswer():int
  {
    return $this->tests()->whereColumn('user_answer_id', 'NOT LIKE', 'right_answer_id')->select('user_answer_id', 'right_answer_id')->count();
  }

}
