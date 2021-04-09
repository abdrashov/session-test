<?php

namespace App\Http\Livewire\User;

use App\Models\Rating;
use Livewire\Component;

class TestResult extends Component
{
	public $rating;
	public $no_response;

	public function mount($code){
		$this->rating = auth()->user()->ratings()->where('code', $code)->with('tests.answer1', 'tests.answer2', 'tests.answer3', 'tests.answer4', 'tests.answer5', 'tests.rightAnswerId')->first();
	}

	public function render()
	{
		$this->no_response = $this->rating->tests()->where('user_answer_id', 0)->where('spent_time', 0)->count();
		return view('livewire.user.test-result');
	}
}
