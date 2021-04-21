<?php

use App\Http\Livewire\Discipline;
use App\Http\Livewire\Disciplines;
use App\Http\Livewire\MyDisciplineCreate;
use App\Http\Livewire\MyDisciplines;
use App\Http\Livewire\TestOnline;
use App\Http\Livewire\TestResult;
use App\Http\Livewire\Tests;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Auth\VerificationEmail;
use Illuminate\Support\Facades\Route;


Route::get('logout', function(){
	Auth::logout();
	return redirect('/');
});

Route::middleware('guest')->group(function () {
	Route::get('/', function(){
		return view('welcome');
	})->name('/');

	Route::get('/g/disciplines', [MainController::class, 'index'])->name('g.lessons');

	Route::prefix('social-auth')->name('auth.social')->group(function(){
		Route::get('{provider}', [SocialController::class, 'redirectToProvider']);
		Route::get('{provider}/callback', [SocialController::class, 'handleProviderCallback'])
		->name('.callback');
	});
});

Route::prefix('email')->name('verification')->middleware('auth')->group(function () {
	Route::get('verify', [VerificationEmail::class, 'index'])
		->name('.notice');
	Route::post('verification-notification', [VerificationEmail::class, 'send'])
		->middleware('throttle:6,1')->name('.send');
	Route::get('verify/{id}/{hash}', [VerificationEmail::class, 'verify'])
		->middleware('signed')->name('.verify');
});

Route::get('auth1', function () {
	return 'Super';
})->middleware(['auth:sanctum', 'verified']);

Route::middleware('auth:sanctum')->group(function () {
	Route::prefix('disciplines')->name('disciplines')->group(function(){
		Route::get('', Disciplines::class);
		Route::get('{code}', Discipline::class)->name('.show');
	});

	Route::prefix('tests')->name('tests')->group(function(){
		Route::get('', Tests::class);
		Route::get('{code}', TestOnline::class)->name('.online');
		Route::get('{code}/result', TestResult::class)->name('.result');
	});

	Route::prefix('my/disciplines')->name('my.disciplines')->group(function(){
		Route::get('', MyDisciplines::class);
		Route::get('{id}/create', MyDisciplineCreate::class)->name('.create');
	});
});