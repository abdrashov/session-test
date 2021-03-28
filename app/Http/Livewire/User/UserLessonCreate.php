<?php

namespace App\Http\Livewire\User;

use App\Models\Question;
use Livewire\Component;

class UserLessonCreate extends Component
{
	public $questions;

	public $answers;

  protected $rules = [
    'questions.title' => 'required|string',
    'answers.*.title' => 'required|string',
  ];

  public function render()
  {
    return view('livewire.user.user-lesson-create');
  }

  public function save()
  {
  	$this->validate();
  	dd(Question::create($this->questions)->answers()->createMany($this->answers));
  }


}
