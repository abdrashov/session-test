<?php

namespace App\Http\Livewire;

use App\Http\Controllers\WordController;
use App\Models\Lesson;
use Livewire\Component;
use Livewire\WithFileUploads;

class MyDisciplineCreate extends Component
{
	use WithFileUploads;

	public $lesson;
	public $lesson_id;
	public $questions;
	public $answers;
	public $modal;
	public $file;

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
		$this->validate([
			'questions.title' => 'required|string|max:512',
			'answers.0.title' => 'required|string|max:191',
			'answers.1.title' => 'required|string|max:191',
			'answers.2.title' => 'required|string|max:191',
			'answers.3.title' => 'required|string|max:191',
			'answers.4.title' => 'required|string|max:191',
		]);

		$answers = $this->answers;
		$question = $this->questions;

		unset($this->answers, $this->questions);
		ksort($answers);

		$answers[0] = array_merge($answers[0], ['status' => true]);
		$this->lesson->questions()->create($question)->answers()->createMany($answers);

		$this->byCountTest();
	}

	public function saveWord()
	{
		$this->validate([
	   	'file' => 'required',
		]);
		
		$file_name = $this->file->store('word');

		(new WordController)->index($this->lesson_id, $file_name);

		$this->byCountTest();
	}

	private function byCountTest()
	{
		if( $this->lesson->questions->count() > 49 )
			$this->lesson->update(['status' => true]);
	}


}
