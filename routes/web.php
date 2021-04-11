<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\User\OnlineTestController;
use App\Http\Livewire\User\TestOnline;
use App\Http\Livewire\User\TestResult;
use App\Http\Livewire\User\UserTest;
use App\Http\Livewire\User\UserLesson;
use App\Http\Livewire\User\UserLessonCreate;
use App\Http\Livewire\Lessons;
use App\Http\Livewire\LessonShow;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware('guest')->group(function () {
	Route::get('/', function(){
		return view('welcome');
	})->name('/');
	Route::get('/g/disciplines', [MainController::class, 'index'])->name('g.lessons');
});


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
	Route::get('/disciplines', Lessons::class)->name('lesson.index');
	Route::get('/discipline/{code}', LessonShow::class)->name('lesson.show');
	Route::prefix('dashboard')->group(function(){
		Route::get('', UserTest::class)->name('dashboard');
		Route::get('/discipline', UserLesson::class)->name('user.lesson');
		Route::get('/discipline/create/{id}', UserLessonCreate::class)->name('user.lesson.create');
		Route::get('/{code}', TestOnline::class)->name('user.online.test');
		Route::get('/{code}/result', TestResult::class)->name('user.result.test');
	});
});

