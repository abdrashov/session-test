<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MainController extends Controller
{
	public function index()
	{
		$lessons = Cache::remember('lessons', 600, function () {
			return Lesson::byActive()->get();
		});

		return view('lessons', compact('lessons'));
	}
}
