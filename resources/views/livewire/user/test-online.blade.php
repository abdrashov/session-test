

<x-slot name="header">
	<h2 class="font-semibold text-xl text-gray-800 leading-tight">
		{{ $rating->lesson->title }}
	</h2>
</x-slot>

<div class="pt-8 pb-12">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

		<x-jet-validation-errors class="mb-3"/>

		<div class="py-2 sm:grid sm:grid-cols-3 sm:gap-4">
			<dt class="text-sm font-medium text-gray-500">
				Оставшиеся вопросы
			</dt>
			<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
				{{ $rating->tests()->whereNull('user_answer_id')->count() }}
			</dd>
		</div>
		<div class="py-2 sm:grid sm:grid-cols-3 sm:gap-4">
			<dt class="text-sm font-medium text-gray-500">
				Оставшееся время 
			</dt>
			<dd wire:poll.5000ms="updateTime" class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
				{{ $timeLeft }} мин
			</dd>
		</div>
		<div class="py-2 mb-2 sm:grid sm:grid-cols-3 sm:gap-4">
			<dt class="text-sm font-medium text-gray-500">
				Правильный ответ
			</dt>
			<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
				12
			</dd>
		</div>

		<form wire:submit.prevent="updateAnswer">
			<div class="bg-white shadow overflow-hidden sm:rounded-lg mb-5 break-all"> 
				<div class="px-3 py-4 sm:px-6">
					<h3 class="text-lg leading-6 font-medium text-gray-900">
						{{ $test->question->title }}
					</h3>
				</div>
				<div class="border-t border-b border-gray-200">

					<div class="px-4 flex items-center">
						<input id="answer{{ $test->answer1->id }}" type="radio" class="form-radio" name="test" wire:model.defer="answer_id" value="{{ $test->answer1->id }}">
						<label for="answer{{ $test->answer1->id }}" class="pl-2 inline-block py-4 text-sm text-gray-900">
							{{ $test->answer1->title }}
						</label>
					</div>

					<div class="px-4 flex items-center">
						<input id="answer{{ $test->answer2->id }}" type="radio" class="form-radio" name="test" wire:model.defer="answer_id" value="{{ $test->answer2->id }}">
						<label for="answer{{ $test->answer2->id }}" class="pl-2 inline-block py-4 text-sm text-gray-900">
							{{ $test->answer2->title }}
						</label>
					</div>

					<div class="px-4 flex items-center">
						<input id="answer{{ $test->answer3->id }}" type="radio" class="form-radio" name="test" wire:model.defer="answer_id" value="{{ $test->answer3->id }}">
						<label for="answer{{ $test->answer3->id }}" class="pl-2 inline-block py-4 text-sm text-gray-900">
							{{ $test->answer3->title }}
						</label>
					</div>

					<div class="px-4 flex items-center">
						<input id="answer{{ $test->answer4->id }}" type="radio" class="form-radio" name="test" wire:model.defer="answer_id" value="{{ $test->answer4->id }}">
						<label for="answer{{ $test->answer4->id }}" class="pl-2 inline-block py-4 text-sm text-gray-900">
							{{ $test->answer4->title }}
						</label>
					</div>

					<div class="px-4 flex items-center">
						<input id="answer{{ $test->answer5->id }}" type="radio" class="form-radio" name="test" wire:model.defer="answer_id" value="{{ $test->answer5->id }}">
						<label for="answer{{ $test->answer5->id }}" class="pl-2 inline-block py-4 text-sm text-gray-900">
							{{ $test->answer5->title }}
						</label>
					</div>

				</div>
				<div class="px-3 py-4 sm:px-6 text-right">
					<x-jet-button>
						{{ __('Проверить') }}
					</x-jet-button>
				</div>
			</div>
		</form>
	</div>
</div>
