<?php

namespace App\Http\Controllers\User;

use App\Models\Rating;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OnlineTestController extends Controller
{
	public function index()
	{
		$ratings = auth()->user()->ratings()->with('tests', 'lesson')->paginate(10);
		return view('dashboard', compact('ratings'));
	}

	public function show($code)
	{
		$rating = new Rating; // Rating::where('code', $code)->with('tests')->get();
		return view('user.online-test', compact('rating'));
	}
}
