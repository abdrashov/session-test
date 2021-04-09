<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Rating;
use Illuminate\Http\Request;

class LessonController extends Controller
{
	public function show($code)
	{
		$lesson = Lesson::where('code', $code)->with('user', 'questions.answers')->first();
		return view('lessons.show', compact('lesson'));
	}
}
