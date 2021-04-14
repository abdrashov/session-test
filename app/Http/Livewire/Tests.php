<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Tests extends Component
{
	public function render()
	{
		$ratings = auth()->user()->ratings()->orderByDesc('status')->orderByDesc('id')->with('lesson:id,title')->get();
		return view('livewire.tests', compact('ratings'));
	}

}
