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

 	public function question()
 	{
 		return $this->hasOne(Question::class, 'id', 'question_id');
 	}

 	public function answer1()
 	{
 		return $this->hasOne(Answer::class, 'id', 'answer1_id');
 	}

 	public function answer2()
 	{
 		return $this->hasOne(Answer::class, 'id', 'answer2_id');
 	}

 	public function answer3()
 	{
 		return $this->hasOne(Answer::class, 'id', 'answer3_id');
 	}

 	public function answer4()
 	{
 		return $this->hasOne(Answer::class, 'id', 'answer4_id');
 	}

 	public function answer5()
 	{
 		return $this->hasOne(Answer::class, 'id', 'answer5_id');
 	}

 	public function getClassAndRightAnswerOrWrongAnswer($answer_id){
 		if( $answer_id == $this->user_answer_id && $this->user_answer_id == $this->right_answer_id )
 			return 'bg-green-100 font-bold';
 		
 		if( $answer_id != $this->user_answer_id && $answer_id == $this->right_answer_id )
 			return 'bg-green-100';
 		
 		if( $answer_id == $this->user_answer_id && $answer_id != $this->right_answer_id )
 			return 'bg-red-100 font-bold';

 		if( $this->user_answer_id === 0 )
 			return 'bg-gray-100';

 		return '';

 	}
 	
}
