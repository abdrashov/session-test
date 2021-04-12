<?php

namespace App\Http\Livewire;

use App\Models\Rating;
use App\Models\Test;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class TestOnline extends Component
{
  public $rating;
  public $test;
  public $answer_id;
  public $time;
  public $timeLeft;

	protected $rules = [
		'answer_id' => 'required'
	];

  protected $listeners = ['updateAnswer'];

  public function mount($code)
  {
    $this->rating = auth()->user()->ratings()->with('tests', 'lesson')->where('code', $code)->first();
  }
  
  private function getTestTime()
  {
    $this->timeLeft = ($this->rating->test_time * 60) - $this->rating->getSumSpentTime();
    if( $this->timeLeft > 0 && $this->timeLeft < 60 )
      $this->timeLeft = '< 1';
    else
      $this->timeLeft = (int) floor($this->timeLeft/60);
  }
  
  private function checkTestTime()
  {
    if( $this->timeLeft <= 0 && is_int($this->timeLeft) ){
      $this->rating->tests()->whereNull('user_answer_id')->update([
        'user_answer_id' => 0,
      ]);
      $this->rating->tests()->whereNull('spent_time')->update([
        'spent_time' => 0,
      ]);
    }
  }
  
  private function getTestOrRedirect()
  {
    $this->test = $this->rating->tests()->whereNull('user_answer_id')->first();
    if( empty( $this->test ) ){
      $this->rating->update(['status' => false]);
      return redirect()->route('tests.result', $this->rating->code);
    }
  }
  
  public function render()
  {
    $this->time = time();
    $this->getTestTime();
    $this->checkTestTime();
    $this->getTestOrRedirect();
    return view('livewire.test-online');
	}

  public function updateAnswer()
  {
  	$this->validate();
  	@$this->test->update(['user_answer_id' => $this->answer_id]);
    $this->answer_id = null;
	}

  public function updateTime()
  {
    $spent_time = $this->test->spent_time + (time() - $this->time);
    $this->test->update(['spent_time' => $spent_time]);
  }

}
