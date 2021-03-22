<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Rating;
use Illuminate\Http\Request;

class LessonController extends Controller
{
	public function index()
	{
		$lessons = Lesson::with('questions')->paginate(10);
		if(!$lessons->first())
			return abort(404);
		return view('lessons.index', compact('lessons'));
	}

	public function show($code)
	{
		$lesson = Lesson::where('code', $code)->with('user', 'questions.answers')->first();
		return view('lessons.show', compact('lesson'));
	}

	public function addUser(Request $request)
	{
		$rating = Rating::create([
			'code' => str_replace(' ', '-', auth()->user()->name).'-'.time().$request->id,
			'lesson_id' => $request->id,
			'user_id' => auth()->id(),
		]);
		foreach( $rating->questions()->inrandomorder()->limit(20)->with('answers')->get() as $question ){
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
		return redirect()->route('dashboard');
	}

}
