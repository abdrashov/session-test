<x-app-layout>
<div>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-2">
      {{ $lesson->title }}
    </h2>  
    <div class="py-2 sm:grid sm:grid-cols-3 sm:gap-4">
      <dt class="text-sm font-medium text-gray-500">
        Количество вопросов
      </dt>
      <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
        {{ $lesson->questions->count() }}
      </dd>
    </div>
    <div class="py-2 sm:grid sm:grid-cols-3 sm:gap-4">
      <dt class="text-sm font-medium text-gray-500">
        Тест создано
      </dt>
      <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
        {{ $lesson->created_at->format('d.m.Y') }}
      </dd>
    </div>
    <div class="py-2 sm:grid sm:grid-cols-3 sm:gap-4">
      <dt class="text-sm font-medium text-gray-500">
        Тест добавлен
      </dt>
      <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
        {{ $lesson->user->name }}
      </dd>
    </div>
    <div class="py-2 text-right text-sm text-gray-500">
      Правильный ответ на вопрос А
    </div>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      @foreach( $lesson->questions as $question )
        <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-5">
          <div class="px-3 py-4 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
              <b>#{{ $loop->iteration }}</b> {{ $question->title }}
            </h3>
          </div>
          <div class="border-t border-gray-200">
            @foreach( $question->answers as $key => $answer )
              <p class="{{ ($answer->status == 0) ? 'bg-green-50' : '' }} p-4 text-sm text-gray-900">
                {{ range('A','Z')[$key].') '.$answer->title }}
              </p>
            @endforeach
          </div>
        </div>
      @endforeach

    </div>
  </div>

</div>

</x-app-layout>
