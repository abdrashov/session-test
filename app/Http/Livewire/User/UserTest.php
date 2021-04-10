<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserTest extends Component
{
  public function render()
  {
    $ratings = auth()->user()->ratings()->orderByDesc('status')->orderByDesc('id')->get();
    return view('livewire.user.user-test', compact('ratings'));
  }
}
