<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
  use HasFactory;

  protected $fillable = ['code', 'user_id', 'lesson_id', 'status', 'test_count', 'test_time'];

  public function scopeByCode($query, $code)
  {
    return $query->where('code', $code);
  }

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

  /**
   * Создает рейтинг для пользовался
   */
  public function storeRating($lesson_id, $test_count, $test_time)
  {
    $code = str_replace(' ','-',strtolower(auth()->user()->name)).'-'.time().$lesson_id;
    return $this->create([
      'code' => $code,
      'lesson_id' => $lesson_id,
      'user_id' => auth()->id(),
      'test_count' => $test_count,
      'test_time' => $test_time,
    ]);
  }

  /**
   * Создает тесты на основе введенного количества
   * Получает данные из обекта storeQuestion и storeAnswer
   */
  public function storeQuestionsAndAnswers($test_count)
  {
    $params = [];
    foreach( $this->storeQuestion($test_count) as $question ){
      $params[] = $question;
    }
    return $params;
  }

  /**
   * Предаем полученные данные из бд в storeQuestionsAndAnswers
   */
  private function storeQuestion($test_count) 
  {
    $questions = $this->questions()->has('answers', '>=', 4)->inRandomOrder()->limit($test_count)->get();
    foreach( $questions as $question ){
      $answers = [];
      foreach( $this->storeAnswer($question) as $answer ){
        $answers = array_merge($answers, $answer);
      }
      yield array_merge(['question_id' => $question->id], $answers);
    } 

  }

  /**
   * Предаем полученные данные из бд в storeQuestion
   */
  private function storeAnswer($question)
  {
    $answers = $question->answers()->inRandomOrder()->get()->toArray();
    foreach( $answers as $key => $answer ){
      if( (int) $answer['status'] == 1 )
        yield [
          'answer'.($key+1).'_id' => $answer['id'],
          'right_answer_id' => $answer['id'],
        ];
      else
        yield [
          'answer'.($key+1).'_id' => $answer['id']
        ];
    }
  }

}
