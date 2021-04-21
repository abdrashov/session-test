<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerificationEmail extends Controller
{
	public function index()
	{
		return view('auth.verify-email');
	}

	public function send(Request $request)
	{
		$request->user()->sendEmailVerificationNotification();
		return back()->with('message', 'Verification link sent!');
	}

	public function verify(EmailVerificationRequest $request)
	{
		$request->fulfill();
		return redirect('/tests');
	}
}
