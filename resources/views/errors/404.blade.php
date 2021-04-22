<x-other-layout>
    <x-guest.authentication-card>
        <x-slot name="image">
            <img
            class="object-cover w-full h-full"
            src="../assets/img/404.jpeg"
            alt="Office"
            />
        </x-slot>

        <h1 class="mb-4 text-xl font-semibold text-gray-700 sm:text-2xl" >
            404 | НЕ НАЙДЕНО
        </h1>

        <div class="mb-4 text-sm text-gray-600">
            Извините, страница, которую вы ищете, не существует.
        </div>

        <hr class="my-4" />

        <p class="mt-4">
            <a href="{{ route('/') }}" class="text-sm font-medium text-indigo-600  hover:underline">{{ __('Dashboard') }}</a>
        </p>
        
    </x-guest.authentication-card>
</x-other-layout>