<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Lesson;

class LessonShow extends Component
{
	public function render()
	{
		$lesson = Lesson::where('code', $code)->with('user', 'questions.answers')->first();
		return view('livewire.lesson', compact('lesson'));
	}
}
