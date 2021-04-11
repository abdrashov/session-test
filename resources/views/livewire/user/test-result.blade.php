
<x-slot name="header">
	<h2 class="font-semibold text-xl text-gray-800 leading-tight mb-2">
		{{ $rating->lesson->title }}
	</h2>
</x-slot>

 <div class="pt-4 pb-12">
	<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

 		<div class="px-4  sm:px-0 py-3">
			<div class="grid grid-cols-3 gap-4">
				<dt class="text-sm font-medium text-gray-500 sm:col-span-1 col-span-2">
					Потраченное время
				</dt>
				<dd class="text-sm text-gray-900 sm:col-span-2">
					{{ floor($this->rating->getSumSpentTime() / 60) }} мин 
					{{ $this->rating->getSumSpentTime() % 60 }} сек
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
					Неверный ответ
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

		<div class="bg-white shadow sm:rounded-lg py-3">
			@foreach( $rating->tests as $test )
			<div class="break-words mx-6 pb-4 mb-4 border-gray-200 border-b">
				<div class="-mx-6 px-4 pb-3 sm:px-8">
					<h3 class="text-lg leading-6 font-medium text-gray-900">
						<b>#{{ $loop->iteration }}</b> {{ $test->question->title }}
					</h3>
				</div>
				<div class="-mx-6">
					<p class="{{ $test->getClassAndRightAnswerOrWrongAnswer($test->answer1_id) }} px-4 sm:px-6 py-2 text-sm text-gray-900">
						{{ $test->answer1->title }}
					</p>
					<p class="{{ $test->getClassAndRightAnswerOrWrongAnswer($test->answer2_id) }} px-4 sm:px-6 py-2 text-sm text-gray-900">
						{{ $test->answer2->title }}
					</p>
					<p class="{{ $test->getClassAndRightAnswerOrWrongAnswer($test->answer3_id) }} px-4 sm:px-6 py-2 text-sm text-gray-900">
						{{ $test->answer3->title }}
					</p>
					<p class="{{ $test->getClassAndRightAnswerOrWrongAnswer($test->answer4_id) }} px-4 sm:px-6 py-2 text-sm text-gray-900">
						{{ $test->answer4->title }}
					</p>
					<p class="{{ $test->getClassAndRightAnswerOrWrongAnswer($test->answer5_id) }} px-4 sm:px-6 py-2 text-sm text-gray-900">
						{{ $test->answer5->title }}
					</p>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
