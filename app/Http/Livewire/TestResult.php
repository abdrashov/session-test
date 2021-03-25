<?php

namespace App\Http\Livewire;

use App\Models\Rating;
use Livewire\Component;

class TestResult extends Component
{
	public $rating;

	public function mount($code){
		$this->rating = auth()->user()->ratings()->where('code', $code)->with('tests.answer1', 'tests.answer2', 'tests.answer3', 'tests.answer4', 'tests.answer5', 'tests.rightAnswerId')->first();
	}

  public function render()
  {
    return view('livewire.test-result');
  }
}
