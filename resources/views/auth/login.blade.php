
@section('title', 'Войти | Auezov University Test')

<x-guest-layout>
	<x-guest.authentication-card>
		<x-slot name="image">
			<img
			aria-hidden="true"
			class="object-cover w-full h-full dark:hidden"
			src="../assets/img/login-office.jpeg"
			alt="Office"
			/>
		</x-slot>

		<h1 class="mb-4 text-xl font-semibold text-gray-700 sm:text-2xl" >
			{{ __('Login') }}
		</h1>

		<x-jet-validation-errors class="mb-4" />

		@if (session('status'))
		<div class="mb-4 font-medium text-sm text-green-600">
			{{ session('status') }}
		</div>
		@endif

		<form method="POST" action="{{ route('login') }}">
			@csrf

			<div>
				<x-jet-label for="email" value="{{ __('Email') }}" />
				<x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
			</div>

			<div class="mt-4">
				<x-jet-label for="password" value="{{ __('Password') }}" />
				<x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
			</div>

         <div class="block mt-4">
          	<label for="remember_me" class="flex items-center">
              	<x-jet-checkbox id="remember_me" name="remember" />
              	<span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
          	</label>
         </div>

			<div class="flex justify-end mt-4">
				<button class="block w-full px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-indigo-600 border border-transparent rounded-lg active:bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:shadow-outline-indigo">
					{{ __('Login') }}
				</button>
			</div>

		</form>

		<hr class="my-4" />

     	<a href="{{ route('auth.social', 'vkontakte') }}" class="flex items-center justify-center w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
     		<img width="20" class="mr-1" src="https://image.flaticon.com/icons/png/512/25/25684.png" alt="vk"> 
     		 Vkontakte
     	</a>

     	<a {{-- href="{{ route('auth.social', 'facebook') }}" --}} class="flex items-center justify-center w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-white transition-colors duration-150 border rounded-lg bg-transparent text-gray-400 outline-none focus:shadow-outline-gray">
     		Facebook
     		скоро...
     	</a>

		@if (Route::has('password.request'))
		<p class="mt-4">
			<a class="text-sm font-medium text-indigo-600 dark:text-indigo-400 hover:underline" href="{{ route('password.request') }}" >
				{{ __('Forgot your password?') }}
			</a>
		</p>
		@endif
		<p class="mt-1">
			<a class="text-sm font-medium text-indigo-600 dark:text-indigo-400 hover:underline" href="{{ route('register') }}">
				{{ __('Create Account') }}
			</a>
		</p>
	</x-guest.authentication-card>
</x-guest-layout>
