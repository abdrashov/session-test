<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MainController extends Controller
{
	public function index()
	{
		$lessons = Cache::remember('lessons', 1200, function () {
			return Lesson::byActive()->get();
		});
		$description = '';
		foreach($lessons as $lesson){
			$description = $description.$lesson->title.'. ';
			if( strlen($description) > 120 )
				break;
		}
		return view('lessons', compact('lessons', 'description'));
	}
}
