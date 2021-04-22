
@section('title',  __('Forgot your password?') . ' | Auezov University Test')

<x-guest-layout>
    <x-guest.authentication-card>
        <x-slot name="image">
            <img
              aria-hidden="true"
              class="object-cover w-full h-full dark:hidden"
              src="../assets/img/forgot-password-office.jpeg"
              alt="Office"
            />
        </x-slot>

      <h1 class="mb-4 text-lg font-medium text-gray-700 dark:text-gray-200">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
      </h1>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>

    </x-guest.authentication-card>
</x-guest-layout>
