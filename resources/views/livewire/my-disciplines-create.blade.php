 <x-slot name="header">
 	<div class="flex justify-between">
 		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
 			{{ $lesson->title }}
 		</h2>
 	</div>  
 </x-slot>
 
 <x-test-container>

 	<x-slot name="header">
 		<x-test-grid-text>
 			<x-slot name="header"> Количество вопросов </x-slot>
 			{{ $lesson->questions->count() }}
 		</x-test-grid-text>

 		<x-test-grid-text class="mt-3">
 			<x-slot name="header">Тест создано</x-slot>
 			{{ $lesson->created_at->format('d/m/Y') }}
 		</x-test-grid-text>

 		<x-test-grid-text class="mt-3">
 			<x-slot name="header">Тест добавлен</x-slot>
 			{{ $lesson->user->name }}
 		</x-test-grid-text>
 	</x-slot>

 	<form wire:submit.prevent="save">

 		<div class="px-3 pt-3 pb-1 sm:px-5">
 			<textarea rows="3" wire:model.defer="questions.title" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Вопрос"></textarea>
 			<x-jet-input-error for="questions.title" class="mt-2" />
 		</div>

 		<div class="px-2 sm:px-4 py-1 rounded-md">
 			<x-input-span :bg="true" wire:model.defer="answers.0.title" placeholder="Правильный ответ">
 				A
 			</x-input-span>
 			<x-jet-input-error for="answers.0.title" class="mt-1" />
 		</div>

 		<div class="px-2 sm:px-4 py-1 rounded-md">
 			<x-input-span :bg="false" wire:model.defer="answers.1.title" placeholder="Неверный ответ">
 				B
 			</x-input-span>
 			<x-jet-input-error for="answers.1.title" class="mt-1" />
 		</div>

 		<div class="px-2 sm:px-4 py-1 rounded-md">
 			<x-input-span :bg="false" wire:model.defer="answers.2.title" placeholder="Неверный ответ">
 				С
 			</x-input-span>
 			<x-jet-input-error for="answers.2.title" class="mt-1" />
 		</div>

 		<div class="px-2 sm:px-4 py-1 rounded-md">
 			<x-input-span :bg="false" wire:model.defer="answers.3.title" placeholder="Неверный ответ">
 				D
 			</x-input-span>
 			<x-jet-input-error for="answers.3.title" class="mt-1" />
 		</div>

 		<div class="px-2 sm:px-4 py-1 rounded-md">
 			<x-input-span :bg="false" wire:model.defer="answers.4.title" placeholder="Неверный ответ">
 				E
 			</x-input-span>
 			<x-jet-input-error for="answers.4.title" class="mt-1" />
 		</div>

 		<x-jet-button class="mt-1 mx-3 mb-3">
 			Сохранить
 		</x-jet-button>
 	</form>

 	<h3 class="pt-4 pb-2 px-4 sm:px-8 font-semibold text-xl text-gray-800 leading-tight">
 		Вопросы
 	</h3>

 	<hr class="mb-2">
 	@if( !$lesson->questions()->exists() )
 		<div class="px-4 sm:px-8 py-3 bg-gray-200">
 			<p class="font-semibold text-sm text-gray-600">
 				Вопросов не найдено или вы их еще не добавили
 			</p>
 		</div>
 	@endif
 	@foreach( $lesson->questions->load('answers') as $question )
	 	<x-test-card>
	 		<x-slot name="header">
	 			<b>#{{ $loop->iteration }}</b> {{ $question->title }}
	 		</x-slot>

	 		@foreach( $question->answers as $key => $answer )

		 		<x-test-answer class="{{ ($answer->status == 1) ? 'bg-green-100' : '' }}">
		 			{{ range('A','Z')[$key].') '.$answer->title }}
		 		</x-test-answer>

	 		@endforeach
	 	</x-test-card>
 	@endforeach

 </x-test-container>