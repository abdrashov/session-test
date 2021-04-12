<x-slot name="header">
	<h2 class="font-semibold text-xl text-gray-800 leading-tight">
		{{ $lesson->title }}
	</h2> 

	<x-test-grid-text class="mt-1">
		<x-slot name="header"> Количество вопросов </x-slot>
		{{ $lesson->questions->count() }}
	</x-test-grid-text>

	<x-test-grid-text class="mt-3">
		<x-slot name="header"> Тест создано </x-slot>
		{{ $lesson->created_at->format('d.m.Y') }}
	</x-test-grid-text>

	<div class="pt-2 text-right text-sm text-gray-500">
		Правильный ответ <span class="inline-block bg-green-100" style="width: 18px; height: 14px"></span>
	</div>
</x-slot>

<div class="py-12">
	<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
		<div class="bg-white shadow sm:rounded-lg py-3">
			@foreach( $lesson->questions as $question )
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
		</div>
	</div>
</div>
