<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Lesson;
use App\Models\Rating;

class Disciplines extends Component
{
	public $modal = false;
	public $lesson_id;
	public $lesson_title;
	public $test_count;
	public $test_time;

	protected $rules = [
		'lesson_id' => 'required',
		'test_count' => 'required|integer|min:5|max:100',
		'test_time' => 'required|integer|min:1|max:50'
	];

	public function render()
	{
		$lessons = Lesson::byActive()->withCount('questions')->paginate(10);
		return view('livewire.disciplines', compact('lessons'));
	}

	public function modalOpen($lesson_id, $lesson_title)
	{
		$this->modal = true;
		$this->lesson_id = $lesson_id;
		$this->lesson_title = $lesson_title;
	}

	public function addTest()
	{
		$this->validate();
		// Создает рейтинг для пользовался 
		$rating = (new Rating)->storeRating($this->lesson_id, $this->test_count, $this->test_time);
		// Создает тесты на основе введенного количества
		$rating->tests()->createMany($rating->storeQuestionsAndAnswers($this->test_count));
		
		return redirect()->route('tests');
	}

}
