<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Tests extends Component
{
	public $ratings;

	public function mount()
	{
		$this->ratings = auth()
								->user()
								->ratings()
								->orderByDesc('status')
								->orderByDesc('id')
								->get();
	}

	public function render()
	{
		return view('livewire.tests');
	}

}
