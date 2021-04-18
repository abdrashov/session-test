<?php

use App\Http\Livewire\Discipline;
use App\Http\Livewire\Disciplines;
use App\Http\Livewire\MyDisciplineCreate;
use App\Http\Livewire\MyDisciplines;
use App\Http\Livewire\TestOnline;
use App\Http\Livewire\TestResult;
use App\Http\Livewire\Tests;
use Illuminate\Support\Facades\Route;

require_once __DIR__ . '\\guest.php';

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

