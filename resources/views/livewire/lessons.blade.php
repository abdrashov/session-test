<div>
<x-slot name="header">
	<h2 class="font-semibold text-xl text-gray-800 leading-tight">
		{{ __('Дисциплины') }}
	</h2>
</x-slot>

<div class="py-12">

	<form>

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
					<x-jet-input wire:model="test_count" id="test_count" class="block mt-1 w-full" type="number" placeholder="Пример: 20 вопросов" />
					<x-jet-input-error for="test_count" class="mt-2" />
				</div>
				<div>
					<x-jet-label for="test_time" value="{{ __('Сколько времени вы хотите потратить на тест? минутах') }}" />
					<x-jet-input wire:model="test_time" id="test_time" class="block mt-1 w-full" type="number" placeholder="Пример: 40 мин" />
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
	</form>

	<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
		<div class="overflow-hidden sm:rounded-lg border-b border-gray-200 shadow">
			<div class="flex flex-col">
				<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
					<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
						<div class="overflow-hidden">
							<table class="min-w-full divide-y divide-gray-200">
								<thead class="bg-gray-50">
									<tr>
										<th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
											#
										</th>
										<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
											Дисциплина
										</th>
										<th scope="col" colspan="2" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
											Вопросы
										</th>
										<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
											Тест
										</th>
									</tr>
								</thead>
								<tbody class="bg-white divide-y divide-gray-200">
									@foreach($lessons as $lesson)

									<tr>
										<td class="px-4 py-4">
											<div class="text-sm font-medium text-gray-900">
												{{ (($lessons->perPage()*$lessons->currentPage())-$lessons->perPage())+$loop->iteration }}
											</div>
										</td>
										<td class="px-6 py-4 whitespace-nowrap">
											<div class="text-sm text-gray-900">
												{{ $lesson->title }}
											</div>
										</td>
										<td class="px-6 py-4 whitespace-nowrap">
											<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
												{{ $lesson->questions->count() }}
											</span>
										</td>
										<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
											<a href="{{ route('lesson.show' , $lesson->code) }}" class="text-indigo-600 hover:text-indigo-900">
												Открыть все вопросы
											</a>
										</td>
										<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
											<x-jet-button wire:click="modalOpen({{ $lesson->id }}, '{{ $lesson->title }}')" wire:loading.attr="disabled">
												Сдать пробный тест
											</x-jet-button>
										</td>
									</tr>
									@endforeach

									<!-- More items... -->
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<!-- This example requires Tailwind CSS v2.0+ -->
			<div class="bg-gray-50 px-4 py-3 border-t border-gray-200 sm:px-6">
				{{ $lessons->links() }}
			</div>

		</div>
	</div>
</div>
</div>