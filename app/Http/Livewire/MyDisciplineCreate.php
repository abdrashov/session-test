<?php

namespace App\Http\Livewire;

use App\Models\Lesson;
use Livewire\Component;

class MyDisciplineCreate extends Component
{
	public $lesson;
	public $lesson_id;
	public $questions;
	public $answers;

	protected $rules = [
		'questions.title' => 'required|string|max:512',
		'answers.0.title' => 'required|string|max:191',
		'answers.1.title' => 'required|string|max:191',
		'answers.2.title' => 'required|string|max:191',
		'answers.3.title' => 'required|string|max:191',
		'answers.4.title' => 'required|string|max:191',
	];

	public function mount($id)
	{
		$this->lesson_id = $id;
	}

	public function render()
	{
		$this->lesson = auth()->user()->lessons()->with(['questions' => function ($query) {
			$query->orderBy('created_at', 'desc');
		}])->findOrFail($this->lesson_id);
		
		return view('livewire.my-disciplines-create');
	}

	public function save()
	{
		$this->validate();

		$answers = $this->answers;
		$question = $this->questions;

		unset($this->answers, $this->questions);
		ksort($answers);

		$answers[0] = array_merge($answers[0], ['status' => true]);
		$this->lesson->questions()->create($question)->answers()->createMany($answers);

		if( $this->lesson->questions->count() > 49 )
			$this->lesson->update(['status' => true]);

	}


}
