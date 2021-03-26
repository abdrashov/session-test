
<x-slot name="header">
  <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-2">
    {{ $rating->lesson->title }}
  </h2>
</x-slot>

	<div class="pt-8 pb-12">
	  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
		  <div class="py-2 sm:grid sm:grid-cols-3 sm:gap-4">
		    <dt class="text-sm font-medium text-gray-500">
		      Потрачено время 
		    </dt>
		    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
		    	{{ $rating->getSumSpentTime() }}мин
		    </dd>
		  </div>
		  <div class="py-2 mb-2 sm:grid sm:grid-cols-3 sm:gap-4">
		    <dt class="text-sm font-medium text-gray-500">
		      Правильный ответ
		    </dt>
		    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
		    	{{ $rating->getSumRightAnswer() }}
		    </dd>
		  </div>
		  <div class="py-2 mb-2 sm:grid sm:grid-cols-3 sm:gap-4">
		    <dt class="text-sm font-medium text-gray-500">
		      Не правильный ответ
		    </dt>
		    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
		    	{{ $rating->getSumWrongAnswer() }}
		    </dd>
		  </div>
      @foreach( $rating->tests as $test )
        <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-5">
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