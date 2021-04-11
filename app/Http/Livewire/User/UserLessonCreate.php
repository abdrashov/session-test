<?php

namespace App\Http\Livewire\User;

use App\Models\Lesson;
use Livewire\Component;

class UserLessonCreate extends Component
{
  public $lesson;
  public $lesson_id;
  public $questions;
  public $answers;

  protected $rules = [
    'questions.title' => 'required|string',
    'answers.0.title' => 'required|string',
    'answers.1.title' => 'required|string',
    'answers.2.title' => 'required|string',
    'answers.3.title' => 'required|string',
    'answers.4.title' => 'required|string',
  ];

  public function mount($id)
  {
    $this->lesson_id = $id;
  }

  public function render()
  {
    $this->lesson = auth()->user()->lessons()->with(['questions' => function ($query) {
      $query->orderBy('created_at', 'desc');
    }])->find($this->lesson_id);
    return view('livewire.user.user-lesson-create');
  }

  public function save()
  {
  	$this->validate();
    $params = $this->answers;
    $params[0] = array_merge($params[0], ['status' => true]);
    $this->lesson->questions()->create($this->questions)->answers()->createMany($params);
    unset($this->answers, $this->questions);
    if( $this->lesson->questions->count() > 49 )
      $this->lesson->update(['status' => true]);

  }


}
