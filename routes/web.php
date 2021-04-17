<?php

use App\Http\Controllers\AuthController\FaceBookController;
use App\Http\Controllers\MainController;
use App\Http\Livewire\Discipline;
use App\Http\Livewire\Disciplines;
use App\Http\Livewire\MyDisciplineCreate;
use App\Http\Livewire\MyDisciplines;
use App\Http\Livewire\TestOnline;
use App\Http\Livewire\TestResult;
use App\Http\Livewire\Tests;
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

	Route::prefix('auth/facebook')->group(function(){
		Route::get('', [FaceBookController::class, 'redirect'])->name('facebook');
		Route::get('/callback', [FaceBookController::class, 'loginOrRegister']);
	});

});



Route::middleware(['auth:sanctum', 'verified'])->group(function () {

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

