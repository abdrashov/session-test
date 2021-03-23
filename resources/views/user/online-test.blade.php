<x-slot name="header">
  <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-2">
    {{ $rating->title }}
  </h2>  
  <div class="py-2 sm:grid sm:grid-cols-3 sm:gap-4">
    <dt class="text-sm font-medium text-gray-500">
      Оставшиеся вопросы
    </dt>
    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
      {{ $rating->tests->count() }}
    </dd>
  </div>
  <div class="py-2 sm:grid sm:grid-cols-3 sm:gap-4">
    <dt class="text-sm font-medium text-gray-500">
      Оставшееся время 
    </dt>
    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
      25 минут
    </dd>
  </div>
  <div class="py-2 sm:grid sm:grid-cols-3 sm:gap-4">
    <dt class="text-sm font-medium text-gray-500">
      Правильный ответ
    </dt>
    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
      12
    </dd>
  </div>
</x-slot>

<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    {{-- @foreach( $rating->tests as $test ) --}}
    @php 
    	$test = $rating->tests->first();
    @endphp
      <x-jet-validation-errors class="mb-3"/>
	    <form wire:submit.prevent="update({{ $test->id }})">
	      <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-5"> 
	        <div class="px-3 py-4 sm:px-6">
	          <h3 class="text-lg leading-6 font-medium text-gray-900">
	            <b>#{{-- {{ $loop->iteration }} --}}</b> {{ $test->question->title }}
	          </h3>
	        </div>
	        <div class="border-t border-b border-gray-200">
			      <label class="block p-4 text-sm text-gray-900">
			        <input type="radio" class="form-radio" name="test" wire:model="answer_id" value="{{ $test->answer5->id }}">
			        <span class="ml-2">
			        	{{ $test->answer1->title }}
			        </span>
			      </label>
			      <label class="block p-4 text-sm text-gray-900">
			        <input type="radio" class="form-radio" name="test" wire:model="answer_id" value="{{ $test->answer5->id }}">
			        <span class="ml-2">
			        	{{ $test->answer2->title }}
			        </span>
			      </label>
			      <label class="block p-4 text-sm text-gray-900">
			        <input type="radio" class="form-radio" name="test" wire:model="answer_id" value="{{ $test->answer5->id }}">
			        <span class="ml-2">
			        	{{ $test->answer3->title }}
			        </span>
			      </label>
			      <label class="block p-4 text-sm text-gray-900">
			        <input type="radio" class="form-radio" name="test" wire:model="answer_id" value="{{ $test->answer5->id }}">
			        <span class="ml-2">
			        	{{ $test->answer4->title }}
			        </span>
			      </label>
			      <label class="block p-4 text-sm text-gray-900">
			        <input type="radio" class="form-radio" name="test" wire:model="answer_id" value="{{ $test->answer5->id }}">
			        <span class="ml-2">
			        	{{ $test->answer5->title }}
			        </span>
			      </label>
	        </div>
	        <div class="px-3 py-4 sm:px-6 text-right">
	          <x-jet-button>
	              {{ __('Проверить') }}
	          </x-jet-button>
	        </div>
	      </div>
	    </form>
   {{--  @endforeach --}}
  </div>
</div>
