<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Tests extends Component
{
	public function render()
	{
		$ratings = auth()->user()->ratings()->orderByDesc('status')->orderByDesc('id')->get();
		return view('livewire.tests', compact('ratings'));
	}

}
