
<x-slot name="header">
	<h2 class="font-semibold text-xl text-gray-800 leading-tight mb-2">
		{{ $rating->lesson->title }}
	</h2>
</x-slot>

<x-test-container>
	<x-slot name="header">
		<x-test-grid-text>
			<x-slot name="header"> Потраченное время </x-slot>
			@php
				$sec = $this->rating->getSumSpentTime();
				$min = floor( $sec / 60);
				$sec = $sec % 60;
				echo $min != 0 ? "$min мин " : "";
				echo $sec != 0 ? "$sec сек " : "";
			@endphp
		</x-test-grid-text>

		<x-test-grid-text class="mt-3">
			<x-slot name="header">Правильный ответ</x-slot>
			{{ $rating->getSumRightAnswer() }}
		</x-test-grid-text>

		<x-test-grid-text class="mt-3">
			<x-slot name="header">Неверный ответ</x-slot>
			{{ $rating->getSumWrongAnswer() }}
		</x-test-grid-text>

		@if($no_response > 0)
		<x-test-grid-text class="mt-3">
			<x-slot name="header">Без ответа</x-slot>
			{{ $no_response }}
		</x-test-grid-text>
		@endif
	</x-slot>

	@foreach( $rating->tests->load('question:id,title', 'answer1:id,title', 'answer2:id,title', 'answer3:id,title', 'answer4:id,title', 'answer5:id,title') as $test )
		<x-test-card>
			<x-slot name="header">
				<b>#{{ $loop->iteration }}</b> {{ $test->question->title }}
			</x-slot>
			
			<x-test-answer class="{{ $test->getClassAndRightAnswerOrWrongAnswer($test->answer1_id) }}">
				{{ $test->answer1->title }}
			</x-test-answer>
			
			<x-test-answer class="{{ $test->getClassAndRightAnswerOrWrongAnswer($test->answer2_id) }}">
				{{ $test->answer2->title }}
			</x-test-answer>
			
			<x-test-answer class="{{ $test->getClassAndRightAnswerOrWrongAnswer($test->answer3_id) }}">
				{{ $test->answer3->title }}
			</x-test-answer>
			
			<x-test-answer class="{{ $test->getClassAndRightAnswerOrWrongAnswer($test->answer4_id) }}">
				{{ $test->answer4->title }}
			</x-test-answer>
			
			<x-test-answer class="{{ $test->getClassAndRightAnswerOrWrongAnswer($test->answer5_id) }}">
				{{ $test->answer5->title }}
			</x-test-answer>
		</x-test-card>
	@endforeach

</x-test-container>

