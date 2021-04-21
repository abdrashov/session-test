<?php

namespace App\Http\Livewire;

use App\Models\Lesson;
use Livewire\Component;

class MyDisciplines extends Component
{
	public $modal = false;
	public $title;
	public $code;

	protected $rules = [
		'title' => 'required|unique:lessons|string|max:161',
		'code' => 'required|unique:lessons|string|max:191',
	];

	public function updatedTitle()
	{
		$this->code = translitTextOnCode($this->title);
	}

	public function render()
	{
		$lessons = auth()->user()->lessons()->with('questions')->get();
		return view('livewire.my-disciplines', compact('lessons'));
	}

	public function store()
	{
		$this->validate();
		Lesson::create([
			'user_id' => auth()->id(),
			'code' => $this->code,
			'title' => $this->title,
		]);
		$this->code = '';
		$this->title = '';
		$this->modal = false;
	}
}
