<?php

namespace App\Http\Controllers\AuthController\Traits;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;

trait MaketController
{
	protected function socialite($social)
	{
		return Socialite::driver($social);
	}

	protected function create($name, $email)
	{
		return User::create([
			'name' => $name,
			'email' => $email,
			'password' => Hash::make('#Ll'.$email.'!@zZ'),
		]);
	}

	protected function getUser($column, $id)
	{
		return User::whereHas('socialite', function ($query) use ($column, $id) {
			$query->where($column, $id);
		})->first();
	}

}
