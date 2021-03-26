<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserTest extends Component
{
	public $confirmUserDeletion;
	public $confirmingUserDeletion;

  public function mount()
  {
  	$this->confirmUserDeletion = true;
  	$this->confirmingUserDeletion = true;
  }

  public function render()
  {
    return view('livewire.user.user-test');
  }
}
