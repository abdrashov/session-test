<?php

use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
	Route::get('/', function(){
		return view('welcome');
	})->name('/');

	Route::get('/g/disciplines', [MainController::class, 'index'])->name('g.lessons');

	Route::group([
		'prefix' => 'social-auth',
		'as' => 'auth.social',
		'middleware' => 'is_socialte',
	], function(){
		Route::get('{provider}', [SocialController::class, 'redirectToProvider']);
		Route::get('{provider}/callback', [SocialController::class, 'handleProviderCallback'])
			->name('.callback');
	});
});