<x-other-layout>
    <x-guest.authentication-card>
        <x-slot name="image">
            <img
            class="object-cover w-full h-full"
            src="../assets/img/verify.png"
            alt="Office"
            />
        </x-slot>

        <h1 class="mb-4 text-xl font-semibold text-gray-700 sm:text-2xl" >
            Вы успешно зарегистрировались!
        </h1>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent' || Session::has('message'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <hr class="my-4" />

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit">
                        {{ __('Resend Verification Email') }}
                    </x-jet-button>
                </div>
            </form>
        </div>

        <p class="mt-4">
            <a href="{{ route('logout') }}" class="text-sm font-medium text-indigo-600  hover:underline">{{ __('Logout') }}</a>
        </p>
        
    </x-guest.authentication-card>
</x-other-layout>