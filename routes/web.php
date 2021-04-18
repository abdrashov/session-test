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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
	Route::get('/public/tests', function(){
		return redirect()->route('tests');
	});

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