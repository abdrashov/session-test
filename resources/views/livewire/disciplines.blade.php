<x-slot name="header">
	<h2 class="font-semibold text-xl text-gray-800 leading-tight">
		{{ __('Дисциплины') }}
	</h2>
</x-slot>

<div class="py-12">

	<x-jet-dialog-modal wire:model="modal">
		<x-slot name="title">
			Заполните поля
		</x-slot>

		<x-slot name="content">
			<div class="mb-2">
				<x-jet-label value="{{ __('Дисциплина') }}" />
				<x-jet-input class="bg-gray-100 block mt-1 w-full" type="text" value="{{ $lesson_title }}" required disabled />
			</div>
			<div class="mb-2">
				<x-jet-label for="test_count" value="{{ __('Сколько вопросов должно быть в тесте?') }}" />
				<x-jet-input wire:model.defer="test_count" id="test_count" class="block mt-1 w-full" type="number" placeholder="Пример: 20 вопросов" />
				<x-jet-input-error for="test_count" class="mt-2" />
			</div>
			<div>
				<x-jet-label for="test_time" value="{{ __('Сколько времени вы хотите потратить на тест? минутах') }}" />
				<x-jet-input wire:model.defer="test_time" id="test_time" class="block mt-1 w-full" type="number" placeholder="Пример: 40 мин" />
				<x-jet-input-error for="test_time" class="mt-2" />
			</div>
		</x-slot>

		<x-slot name="footer">
			<x-jet-secondary-button wire:click="$toggle('modal')" wire:loading.attr="disabled">
				Отмена
			</x-jet-secondary-button>

			<x-jet-button class="ml-2" wire:click="addTest" type="button" wire:loading.attr="disabled">
				Добавить
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
					Вопросы
				</x-table-header>

				<x-table-header colspan="2">
					Тест
				</x-table-header>
			</x-slot>
			@foreach($lessons as $lesson)
				<tr>
					<x-table-data>
						{{ (($lessons->perPage()*$lessons->currentPage())-$lessons->perPage())+$loop->iteration }}
					</x-table-data>

					<x-table-data width="400">
						{{ $lesson->title }}
					</x-table-data>

					<x-table-data>
						{{ $lesson->created_at->format('d/m/Y') }}
					</x-table-data>

					<x-table-data>
						<x-text-info-card class="bg-green-100 text-green-800">
							{{ $lesson->questions->count() }}
						</x-text-info-card>
					</x-table-data>

					<x-table-data width="130">
						<x-a-link href="{{ route('disciplines.show' , $lesson->code) }}">
							Открыть все вопросы
						</x-a-link>
					</x-table-data>

					<x-table-data>
						<x-jet-button wire:click="modalOpen({{ $lesson->id }}, '{{ $lesson->title }}')" wire:loading.attr="disabled">
							Сдать пробный тест
						</x-jet-button>
					</x-table-data>
				</tr>
			@endforeach
		</x-table-card>

		<x-slot name="footer">
			<div class="bg-gray-50 px-4 py-3 border-t border-gray-200 sm:px-6">
				{{ $lessons->links() }}
			</div>
		</x-slot> 

	</x-table-container>
</div>