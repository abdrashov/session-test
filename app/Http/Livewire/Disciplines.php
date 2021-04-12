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
		'test_count' => 'required|integer|min:10|max:100',
		'test_time' => 'required|integer|min:5|max:50'
	];

	public function render()
	{
		$lessons = Lesson::where('status', true)->with('questions')->paginate(10);
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

		$rating = Rating::create([
			'code' => str_replace(' ', '-', strtolower(auth()->user()->name)).'-'.time().$this->lesson_id,
			'lesson_id' => $this->lesson_id,
			'user_id' => auth()->id(),
			'test_count' => $this->test_count, 
			'test_time' => $this->test_time,
		]);

		foreach( $rating->questions()->inrandomorder()->limit($this->test_count)->with('answers')->get() as $question ){
			$answers = [];
			foreach( $question->answers()->inrandomorder()->limit(5)->get()->toArray() as $key => $answer ){
				$answers = array_merge($answers, [
					'answer'.($key+1).'_id' => $answer['id'],
				]);
				if( $answer['status'] === 1 )
					$right = $answer['id'];
			}
			$params[] = array_merge($answers, [
				'question_id' => $question->id, 
				'right_answer_id' => $right ?? 0
			]);
		}

		$rating->tests()->createMany($params);
		return redirect()->route('tests');
	}

}
