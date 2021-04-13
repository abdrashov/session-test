<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Lesson;

class Discipline extends Component
{
	public $lesson;
	
	public function mount($code)
	{
		$this->lesson = Lesson::where('code', $code)->with('user', 'questions.answers')->firstOrFail();
	}

	public function render()
	{
		return view('livewire.discipline');
	}
}
