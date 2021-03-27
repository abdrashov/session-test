<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserTest extends Component
{
  public $model;

  protected $listeners = ['confirmingUserDeletion' => 'model'];

  public function model()
  {
  	$this->model = true;
  }

  public function mount()
  {
  	$this->emit('userDelete');
  }

  public function render()
  {
    return view('livewire.user.user-test');
  }
}
