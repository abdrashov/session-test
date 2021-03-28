<?php

use App\Http\Controllers\LessonController;
use App\Http\Controllers\User\OnlineTestController;
use App\Http\Livewire\User\TestOnline;
use App\Http\Livewire\User\TestResult;
use App\Http\Livewire\User\UserTest;
use App\Http\Livewire\User\UserLesson;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\User\UserLessonCreate;

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

Route::get('/', [LessonController::class, 'index'])->name('lesson.index');
Route::get('/test/{code}', [LessonController::class, 'show'])->name('lesson.show');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
	Route::put('/test', [LessonController::class, 'addUser'])->name('lesson.add.user');
	Route::prefix('dashboard')->group(function(){
	  Route::get('', UserTest::class)->name('dashboard');
		Route::get('/lesson', UserLesson::class)->name('user.lesson');
		Route::get('/lesson/create', UserLessonCreate::class)->name('user.lesson.create');
		Route::get('/{code}', TestOnline::class)->name('user.online.test');
		Route::get('/{code}/result', TestResult::class)->name('user.result.test');
	});
});

