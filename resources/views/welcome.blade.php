<x-guest-layout>
  <x-guest.container class="pt-24 flex md:flex-row flex-col items-center">
    <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
      
      <h1 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl md:text-5xl">
        <span class="block xl:inline">Платформа для подготовки к сессиям</span>
        <span class="block text-indigo-600 xl:inline">Auezov University</span>
      </h1>

      <div class="sm:text-center lg:text-left">
        <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
          На сайте вы можете найти различные дисциплины и пройти пробные тесты, если вы не нашли свою дисциплину, то можете добавить ее сами
        </p>

        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
          <div class="rounded-md shadow">
            <x-guest.a-link href="{{ route('g.lessons') }}" class="text-white bg-indigo-600 hover:bg-indigo-700">Дисциплины</x-guest.a-link>
          </div>

          <div class="mt-3 sm:mt-0 sm:ml-3">
            <x-guest.a-link href="{{ route('g.lessons') }}" class="text-indigo-700 bg-indigo-100 hover:bg-indigo-200">Войти</x-guest.a-link>
          </div>
        </div>
      </div>

    </div>

    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
      <img class="object-cover object-center rounded" alt="hero" src="assets/img/create-account-office.jpeg">
    </div>
  </x-guest.container>
</x-guest-layout>


