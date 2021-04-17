<?php

namespace App\Http\Controllers\AuthController;

use App\Models\User;
use App\Http\Controllers\AuthController\Traits\MaketController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FaceBookController extends Controller
{
	use MaketController;

	public function redirect()
	{
		return $this->socialite('facebook')->redirect();
	}

	public function loginOrRegister()
	{
		$userSocial = $this->socialite('facebook')->stateless()->user();

		$user = $this->getUser('facebook_id', $userSocial->getId());

		if( !$user ){

			if( User::where('email', $userSocial->getEmail())->exists() ){
				return redirect()->route('login')->withErrors([
					'message' => 'Такое значение поля E-Mail адрес уже существует.'
				]);
			}
			
			$user = $this->create($userSocial->getName(), $userSocial->getEmail());
			$user->socialite()->create(['facebook_id' => $userSocial->getId()]);
		}

		Auth::login($user);
		return redirect()->route('tests');
	}
	
}
