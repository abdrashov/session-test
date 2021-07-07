<x-slot name="header">
	<h2 class="font-semibold text-xl text-gray-800 leading-tight">
		{{ $rating->lesson->title }}
	</h2>
</x-slot>

<x-test-container>

	<x-slot name="header">
		<x-jet-validation-errors class="mb-3"/>

		<x-test-grid-text>
			<x-slot name="header"> Оставшиеся вопросы </x-slot>
			{{ $rating->tests()->whereNull('user_answer_id')->count() }}
		</x-test-grid-text>

		<x-test-grid-text wire:poll.3000ms="updateTime" class="mt-3">
			<x-slot name="header"> Оставшееся время </x-slot>
			{{ $timeLeft }} мин
		</x-test-grid-text>
		
		<x-test-grid-text class="mt-3">
			<x-slot name="header"> Правильный ответ </x-slot>
			{{ $rating->getSumRightAnswer() }}
		</x-test-grid-text>
	</x-slot>

	<form wire:submit.prevent="updateAnswer">
		<div class="px-3 pb-3 sm:px-6 break-words">
			<h3 class="text-lg leading-6 font-medium text-gray-900">
				{{ $test->question->title }}
			</h3>
		</div>
		
		<div class="border-t border-b border-gray-200">
			<x-input-radio answer="{{ $test->answer1->id }}" name="test" wire:model.defer="answer_id">
				{{ $test->answer1->title }}
			</x-input-radio>

			<x-input-radio answer="{{ $test->answer2->id }}" name="test" wire:model.defer="answer_id">
				{{ $test->answer2->title }}
			</x-input-radio>

			<x-input-radio answer="{{ $test->answer3->id }}" name="test" wire:model.defer="answer_id">
				{{ $test->answer3->title }}
			</x-input-radio>

			<x-input-radio answer="{{ $test->answer4->id }}" name="test" wire:model.defer="answer_id">
				{{ $test->answer4->title }}
			</x-input-radio>

			@isset($test->answer5)
			<x-input-radio answer="{{ $test->answer5->id }}" name="test" wire:model.defer="answer_id">
				{{ $test->answer5->title }}
			</x-input-radio>
			@endisset
		</div>
		<div class="px-3 py-4 sm:px-6 text-right">
			<x-jet-button>
				{{ __('Проверить') }}
			</x-jet-button>
		</div>
	</form>

</x-test-container>