<x-app-layout>
<div>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-2">
          {{ __('Моделирование движения газа и жидкости на основе уравнений Навье-Стокса') }}
      </h2>  
      <div class="py-2 sm:grid sm:grid-cols-3 sm:gap-4">
        <dt class="text-sm font-medium text-gray-500">
          Количество вопросов
        </dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
          250
        </dd>
      </div>
      <div class="py-2 sm:grid sm:grid-cols-3 sm:gap-4">
        <dt class="text-sm font-medium text-gray-500">
          Тест создано
        </dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
          25.01.2021
        </dd>
      </div>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

      <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-5">
        <div class="px-3 py-4 sm:px-6">
          <h3 class="text-lg leading-6 font-medium text-gray-900">
            <b>#1</b> Applicant Information
          </h3>
        </div>
        <div class="border-t border-gray-200">
          <p class="bg-green-50 p-4 text-sm text-gray-900">
            Margot Foster
          </p>
          <p class="p-4 text-sm text-gray-900">
            Backend Developer
          </p>
          <p class="p-4 text-sm text-gray-900">
            Application for
          </p>
          <p class="p-4 text-sm text-gray-900">
            Application for
          </p>
          <p class="p-4 text-sm text-gray-900">
            Application for
          </p>
        </div>
      </div>
      

    </div>
  </div>

</div>

</x-app-layout>
