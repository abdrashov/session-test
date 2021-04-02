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
  public $time_left;

	protected $rules = [
		'answer_id' => 'required'
	];

  public function mount($code)
  {
    $this->rating = auth()->user()->ratings()->with('tests', 'lesson')->where('code', $code)->first();
    $this->time = time();

    $this->time_left = $this->rating->getSumSpentTime();
    
  }
  
  public function render()
  {
    $this->test = $this->rating->tests()->whereNull('user_answer_id')->first();
    return view('livewire.user.test-online');
	}

  public function updateAnswer($test_id)
  {
  	$this->validate();
  	$this->updateTime();
  	@$this->test->update(['user_answer_id' => $this->answer_id]);
    $this->time = time();
	}

  public function updateTime()
  {
  	$this->test->update(['spent_time' => (time() - $this->time)]);
	}

  private function updatedTest()
  {
    if( empty( $this->test ) ){
      $this->rating->update(['status' => false]);
      return redirect()->route('dashboard');
    }
  }


}
