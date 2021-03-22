<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
  use HasFactory;

  protected $fillable = [
  	'rating_id', 'question_id', 'answer1_id', 'answer2_id', 'answer3_id', 'answer4_id', 'answer5_id', 'right_answer_id', 'user_answer_id', 'spent_time'
 	];
}
