<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class MainController extends Controller
{
	public function index()
	{
		$lessons = Lesson::all();
		return view('lessons', compact('lessons'));
	}
}
