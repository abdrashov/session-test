<?php

namespace App\Http\Livewire\User;

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
    $this->timeLeft = $this->rating->getSumSpentTime();
  }
  
  private function getTestOrRedirect()
  {
    $this->test = $this->rating->tests()->whereNull('user_answer_id')->first();
    if( empty( $this->test ) ){
      $this->rating->update(['status' => false]);
      return redirect()->route('dashboard');
    }
  }
  
  private function checkTestTime()
  {
    if( $this->timeLeft < 0 && is_int($this->timeLeft) ){
      $this->rating->tests()->whereNull('user_answer_id')->update([
        'user_answer_id' => 0,
        'spent_time' => 0,
      ]);
      return redirect()->route('dashboard');
    }
  }
  
  public function render()
  {
    $this->time = time();
    $this->getTestOrRedirect();
    $this->checkTestTime();
    return view('livewire.user.test-online');
	}

  public function updateAnswer()
  {
  	$this->validate();
  	@$this->test->update(['user_answer_id' => $this->answer_id]);
	}

  public function updateTime()
  {
    $spent_time = $this->test->spent_time + (time() - $this->time);
    $this->test->update(['spent_time' => $spent_time]);
    $this->timeLeft = ((2400 - $this->rating->getSumSpentTime() + (time() - $this->time))/60);
    if( $this->timeLeft > 0 && $this->timeLeft < 1 )
      $this->timeLeft = '< 1';
    else
      $this->timeLeft = round($this->timeLeft);
  }

}
