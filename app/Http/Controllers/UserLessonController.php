<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserLessonController extends Controller
{
	public function index()
	{
		$ratings = auth()->user()->ratings()->with('tests', 'lesson')->paginate(10);
		return view('dashboard', compact('ratings'));
	}
}
