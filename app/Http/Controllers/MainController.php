<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Rating;
use Illuminate\Http\Request;

class MainController extends Controller
{
	public function index()
	{
		$lessons = Lesson::with('user', 'questions.answers')->get();
		return view('lessons', compact('lessons'));
	}

	public function show($code)
	{
		$lesson = Lesson::where('code', $code)->with('user', 'questions.answers')->first();
		return view('lesson', compact('lesson'));
	}
}
