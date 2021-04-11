 <x-slot name="header">
 	<div class="flex justify-between">
 		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
 			{{ $lesson->title }}
 		</h2>
 	</div>  
 </x-slot>
 
 <div class="pt-4 pb-12">
 	<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
 		<div class="px-4  sm:px-0 py-3">
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
 			<div class="mt-3 grid grid-cols-3 gap-4">
 				<dt class="text-sm font-medium text-gray-500 sm:col-span-1 col-span-2">
 					Тест добавлен
 				</dt>
 				<dd class="text-sm text-gray-900 sm:col-span-2">
 					{{ $lesson->user->name }}
 				</dd>
 			</div>
 		</div>

 		<form wire:submit.prevent="save">

 			<div class="bg-white shadow overflow-hidden sm:rounded-lg mb-5">
 				<div class="px-3 pt-3 pb-1 sm:px-5">
 					<textarea rows="3" wire:model.defer="questions.title" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Вопрос"></textarea>
 					<x-jet-input-error for="questions.title" class="mt-2" />
 				</div>

 				<div class="px-2 sm:px-4 py-1 rounded-md">
 					<div class="flex">
 						<span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-green-100 text-gray-500 text-sm">
 							A
 						</span>
 						<input type="text" wire:model.defer="answers.0.title" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Правильный ответ">
 					</div>
 					<x-jet-input-error for="answers.0.title" class="mt-1" />
 				</div>

 				<div class="px-2 sm:px-4 py-1 rounded-md">
 					<div class="flex">
 						<span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-red-50 text-gray-500 text-sm">
 							B
 						</span>
 						<input type="text" wire:model.defer="answers.1.title" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Неверный ответ">
 					</div>
 					<x-jet-input-error for="answers.1.title" class="mt-1" />
 				</div>

 				<div class="px-2 sm:px-4 py-1  rounded-md">
 					<div class="flex">
 						<span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-red-50 text-gray-500 text-sm">
 							С
 						</span>
 						<input type="text" wire:model.defer="answers.2.title" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Неверный ответ">
 					</div>
 					<x-jet-input-error for="answers.2.title" class="mt-1" />
 				</div>

 				<div class="px-2 sm:px-4 py-1  rounded-md">
 					<div class="flex">
 						<span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-red-50 text-gray-500 text-sm">
 							D
 						</span>
 						<input type="text" wire:model.defer="answers.3.title" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Неверный ответ">
 					</div>
 					<x-jet-input-error for="answers.3.title" class="mt-1" />
 				</div>

 				<div class="px-2 sm:px-4 py-1  rounded-md">
 					<div class="flex">
 						<span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-red-50 text-gray-500 text-sm">
 							E
 						</span>
 						<input type="text" wire:model.defer="answers.4.title" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Неверный ответ">
 					</div>
 					<x-jet-input-error for="answers.4.title" class="mt-1" />
 				</div>

 				<x-jet-button class="mt-1 mx-3 mb-3">
 					Сохранить
 				</x-jet-button>

 			</div>
 		</form>

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
