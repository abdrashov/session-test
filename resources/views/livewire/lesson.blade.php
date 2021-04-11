
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-2">
        {{ $lesson->title }}
      </h2>  
      <div class="grid grid-cols-3 gap-4">
        <dt class="text-sm font-medium text-gray-500 sm:col-span-1 col-span-2">
          Количество вопросов
        </dt>
        <dd class="text-sm text-gray-900 sm:col-span-2">
          {{ $lesson->questions->count() }}
        </dd>
      </div>
      <div class="mt-3 grid grid-cols-3 gap-4">
        <dt class="text-sm font-medium text-gray-500 sm:col-span-1 col-span-2">
          Тест создано
        </dt>
        <dd class="text-sm text-gray-900 sm:col-span-2">
          {{ $lesson->created_at->format('d.m.Y') }}
        </dd>
      </div>
      <div class="py-2 text-right text-sm text-gray-500">
        Правильный ответ А
      </div>
      </x-slot>

  <div class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    <div class="bg-white shadow sm:rounded-lg py-3">
      @foreach( $lesson->questions as $question )
      <div class="break-words mx-6 pb-4 mb-4 border-gray-200 border-b">
        <div class="-mx-6 px-4 pb-3 sm:px-8">
          <h3 class="text-lg leading-6 font-medium text-gray-900">
            <b>#{{ $loop->iteration }}</b> {{ $question->title }}
          </h3>
        </div>
        <div class="-mx-6">
          @foreach( $question->answers as $key => $answer )
          <p class="{{ ($answer->status == 1) ? 'bg-green-50' : '' }} px-4 sm:px-6 py-2 text-sm text-gray-900">
            {{ range('A','Z')[$key].') '.$answer->title }}
          </p>
          @endforeach
        </div>
      </div>
      @endforeach

    </div>
  </div>

</div>
