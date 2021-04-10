<x-guest-layout>
	<x-authentication-card>
		<x-slot name="image">
			<img
			aria-hidden="true"
			class="object-cover w-full h-full dark:hidden"
			src="../assets/img/create-account-office-dark.jpeg"
			alt="Office"
			/>
		</x-slot>

		<h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200" >
			{{ __('Create Account') }}
		</h1>

		<x-jet-validation-errors class="mb-4" />

		<form method="POST" action="{{ route('register') }}">
			@csrf

			<div class="mt-4">
				<x-jet-label for="name" value="{{ __('Name') }} Фамилия" />
				<x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
			</div>

			<div class="mt-4">
				<x-jet-label for="email" value="{{ __('Email') }}" />
				<x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
			</div>

			<div class="mt-4">
				<x-jet-label for="password" value="{{ __('Password') }}" />
				<x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
			</div>

			<div class="mt-4">
				<x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
				<x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
			</div>

			@if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
			<div class="mt-4">
				<x-jet-label for="terms">
					<div class="flex items-center">
						<x-jet-checkbox name="terms" id="terms"/>

						<div class="ml-2">
							{!! __('I agree to the :terms_of_service and :privacy_policy', [
								'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
								'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
								]) !!}
						</div>
					</div>
				</x-jet-label>
			</div>
			@endif

			<button class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-indigo-600 border border-transparent rounded-lg active:bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:shadow-outline-indigo">
				{{ __('Create Account') }}
			</button>

		</form>

		<hr class="my-4" />

		<p class="mt-4">
			<a class="text-sm font-medium text-indigo-600 dark:text-indigo-400 hover:underline" href="{{ route('login') }}" >
				{{ __('Already registered?') }}
			</a>
		</p>
		
	</x-authentication-card>
</x-guest-layout>
