<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserTest extends Component
{
  public function render()
  {
    $ratings = auth()->user()->ratings()->paginate(15);
    return view('livewire.user.user-test', compact('ratings'));
  }
}
