<x-slot name="header">
  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Если вы не нашли свою дисциплину, то вы можете создать ее тут сами') }}
  </h2>

  <p class="text-sm text-gray-600">Для того чтобы пройти пробные тесты по вашим дисциплинам, необходимо добавить не менее 50 вопросов</p>
</x-slot>

<div class="py-12">

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-2 text-right">
      <x-jet-button wire:click="$toggle('modal')" wire:loading.attr="disabled">
        Создать дисциплину
      </x-jet-button>
  </div>

  <x-jet-dialog-modal wire:model="modal">
    <x-slot name="title">
      Создать дисциплину
    </x-slot>

    <x-slot name="content">
      <div class="mb-2">
        <x-jet-label for="code" value="{{ __('Код') }}" />
        <x-jet-input wire:model="code" id="code" class="bg-gray-100 block mt-1 w-full" type="text" required disabled />
        <x-jet-input-error for="code" class="mt-2" />
      </div>
      <div>
        <x-jet-label for="title" value="{{ __('Дисциплина') }}" />
        <x-jet-input wire:model="title" id="title" class="block mt-1 w-full" type="text" required autofocus />
        <x-jet-input-error for="title" class="mt-2" />
      </div>
    </x-slot>

    <x-slot name="footer">
      <x-jet-secondary-button wire:click="$toggle('modal')" wire:loading.attr="disabled">
        Отмена
      </x-jet-secondary-button>

      <x-jet-button class="ml-2" wire:click="store" type="button" wire:loading.attr="disabled">
        Создать
      </x-jet-button>
    </x-slot>
  </x-jet-dialog-modal>

  <x-table-container>
    <x-table-card>
      <x-slot name="header">
        <x-table-header>
          #
        </x-table-header>

        <x-table-header>
          Дисциплина
        </x-table-header>

        <x-table-header>
          Дата
        </x-table-header>

        <x-table-header>
          Статус
        </x-table-header>

        <x-table-header colspan="2">
          Вопросы
        </x-table-header>
      </x-slot>
      @foreach($lessons as $lesson)
        <tr>
          <x-table-data>
            {{ $loop->iteration }}
          </x-table-data>

          <x-table-data width="400">
            {{ $lesson->title }}
          </x-table-data>

          <x-table-data>
            {{ $lesson->created_at->format('d/m/Y') }}
          </x-table-data>

          <x-table-data>
            <x-text-info-card class="{{ ($lesson->status == 1) ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
              {{ ($lesson->status == 1) ? 'active' : 'not active' }}
            </x-text-info-card>
          </x-table-data>

          <x-table-data>
            {{ $lesson->questions->count() }}
          </x-table-data>

          <x-table-data>
            <x-a-link href="{{ route('my.disciplines.create' , $lesson->id) }}">
              Подробнее 
            </x-a-link>
          </x-table-data>
        </tr>
      @endforeach
    </x-table-card>
  </x-table-container>

</div>