
<x-slot name="header">
  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Пробные тесты и результаты') }}
  </h2>
</x-slot>

<div class="py-12">

  <x-table-container>
    <x-table-card>
      <x-slot name="header">
        <x-table-header>
          #
        </x-table-header>

        <x-table-header >
          Дисциплина
        </x-table-header>

        <x-table-header>
          Статус
        </x-table-header>

        <x-table-header>
          Дата
        </x-table-header>

        <x-table-header colspan="2">
          Тест
        </x-table-header>
      </x-slot>
      @if( $ratings->count() == 0 )
        <tr>
          <x-table-header colspan="6" class="font-bold">
            Вы еще не прошли пробные тесты. Пройти пробные тесты можно 
            <a href="{{ route('disciplines') }}" class="font-bold text-indigo-600 hover:text-indigo-900">тут</a>
          </x-table-header>
        </tr>
      @endif
      @foreach($ratings as $rating)
        <tr>
          <x-table-data>
            {{ $loop->iteration }}
          </x-table-data>

          <x-table-data width="400">
            {{ $rating->lesson->title }}
          </x-table-data>

          <x-table-data>
            <x-text-info-card class="{{ ($rating->status == 1) ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
              {{ ($rating->status == 1) ? 'active' : 'not active' }}
            </x-text-info-card>
          </x-table-data>

          <x-table-data>
            {{ $rating->created_at->format('d/m/Y') }}
          </x-table-data>

          <x-table-data>
            <span class="whitespace-nowrap">{{ $rating->test_count }} вопросов</span> 
            <br>
            <span class="whitespace-nowrap">{{ $rating->test_time }} минут</span>
          </x-table-data>

          <x-table-data>
            <x-a-link href="{{ route( ($rating->status == 1) ? 'tests.online' : 'tests.result', $rating->code) }}">
              {{ ($rating->status == 1) ? 'Сдать' : 'Резултать' }} 
            </x-a-link>
          </x-table-data>
        </tr>
      @endforeach
    </x-table-card>
  </x-table-container>
  
</div>


