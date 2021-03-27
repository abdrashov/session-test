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

	protected $rules = [
		'answer_id' => 'required'
	];

  public function mount($code)
  {
  	$this->time = time();
    $this->rating = auth()
								    ->user()
								    ->ratings()
								    ->with('tests', 'lesson')
								    ->where('code', $code)
								    ->first();
    if( empty( $this->rating->tests->whereNull('user_answer_id')->first() ) ){
      $this->rating->update(['status' => false]);
      return redirect()->route('dashboard');
    }
  }
  
  public function render()
  {
		$this->test = $this->rating->tests->whereNull('user_answer_id')->first();
    return view('livewire.user.test-online', [
			'test' => $this->test,
			'test_count' => $this->rating->tests->whereNull('user_answer_id')->count(),
		]);
	}

  public function addAnswer($test_id)
  {
  	$this->validate();
  	$this->addTime();
  	@$this->test->update(['user_answer_id' => $this->answer_id]);
  	$this->time = time();
	}

  public function addTime()
  {
  	$this->test->update(['spent_time' => (time() - $this->time)]);
	}

}
