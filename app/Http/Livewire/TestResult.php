<?php

namespace App\Http\Livewire;

use App\Models\Rating;
use Livewire\Component;

class TestResult extends Component
{
	public $rating;

	public function mount($code){
		$this->rating = auth()->user()->ratings()->byCode($code)->with('tests')->firstOrFail();
	}

	public function render()
	{
		$no_response = $this->rating->tests()->where('user_answer_id', 0)->count();
		return view('livewire.test-result', compact('no_response'));
	}
}
