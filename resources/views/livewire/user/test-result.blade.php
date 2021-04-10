
<x-slot name="header">
	<h2 class="font-semibold text-xl text-gray-800 leading-tight mb-2">
		{{ $rating->lesson->title }}
	</h2>
</x-slot>

<div class="pt-4 pb-12">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="py-3">
			<div class="grid grid-cols-3 gap-4">
				<dt class="text-sm font-medium text-gray-500 sm:col-span-1 col-span-2">
					Потрачено время 
				</dt>
				<dd class="text-sm text-gray-900 sm:col-span-2">
					{{ ceil($this->rating->getSumSpentTime()/60) }}мин
				</dd>
			</div>
			<div class="mt-3 grid grid-cols-3 gap-4">
				<dt class="text-sm font-medium text-gray-500 sm:col-span-1 col-span-2">
					Правильный ответ
				</dt>
				<dd class="text-sm text-gray-900 sm:col-span-2">
					{{ $rating->getSumRightAnswer() }}
				</dd>
			</div>
			<div class="mt-3 grid grid-cols-3 gap-4">
				<dt class="text-sm font-medium text-gray-500 sm:col-span-1 col-span-2">
					Не правильный ответ
				</dt>
				<dd class="text-sm text-gray-900 sm:col-span-2">
					{{ $rating->getSumWrongAnswer() }}
				</dd>
			</div>
			@if($no_response > 0)
			<div class="mt-3 grid grid-cols-3 gap-4">
				<dt class="text-sm font-medium text-gray-500 sm:col-span-1 col-span-2">
					Без ответа
				</dt>
				<dd class="text-sm text-gray-900 sm:col-span-2">
					{{ $no_response }}
				</dd>
			</div>
			@endif
		</div>
		@foreach( $rating->tests as $test )
		<div class="bg-white shadow overflow-hidden sm:rounded-lg mb-5 break-all">
			<div class="px-3 py-4 sm:px-6">
				<h3 class="text-lg leading-6 font-medium text-gray-900">
					<b>#{{ $loop->iteration }}</b> {{ $test->question->title }}
				</h3>
			</div>
			<div class="border-t border-gray-200">
				<p class="{{ $test->getClassAndRightAnswerOrWrongAnswer($test->answer1_id) }} p-4 right_answer_id text-sm text-gray-900">
					{{ $test->answer1->title }}
				</p>
				<p class="{{ $test->getClassAndRightAnswerOrWrongAnswer($test->answer2_id) }} p-4 text-sm text-gray-900">
					{{ $test->answer2->title }}
				</p>
				<p class="{{ $test->getClassAndRightAnswerOrWrongAnswer($test->answer3_id) }} p-4 text-sm text-gray-900">
					{{ $test->answer3->title }}
				</p>
				<p class="{{ $test->getClassAndRightAnswerOrWrongAnswer($test->answer4_id) }} p-4 text-sm text-gray-900">
					{{ $test->answer4->title }}
				</p>
				<p class="{{ $test->getClassAndRightAnswerOrWrongAnswer($test->answer5_id) }} p-4 text-sm text-gray-900">
					{{ $test->answer5->title }}
				</p>
			</div>
		</div>
		@endforeach
	</div>
</div>