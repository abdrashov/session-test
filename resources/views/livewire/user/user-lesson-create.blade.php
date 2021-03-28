 <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Добавить тест') }}
      </h2>
    </div>
  </x-slot>
  
  <div class="py-12">

  	<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  		<form wire:submit.prevent="save">
	      <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-5">
	        <div class="px-3 py-1 sm:px-5">
	        	<div class="flex">
	          	<b>#1</b> 
	          	<textarea rows="3" wire:model="questions.title" class="ml-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Вопрос"></textarea>
	          </div>
	           @error('question') <span class="error">{{ $message }}</span> @enderror
	        </div>

	        <div class="px-2 sm:px-4 py-1 flex rounded-md shadow-sm">
	          <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
	            A
	          </span>
	          <input type="text" wire:model="answers.0.title" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Правильный ответ">
	        </div>

	        <div class="px-2 sm:px-4 py-1 flex rounded-md shadow-sm">
	          <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
	            B
	          </span>
	          <input type="text" wire:model="answers.1.title" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Неверный ответ">
	        </div>

	        <div class="px-2 sm:px-4 py-1 flex rounded-md shadow-sm">
	          <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
	            С
	          </span>
	          <input type="text" wire:model="answers.2.title" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Неверный ответ">
	        </div>

	        <div class="px-2 sm:px-4 py-1 flex rounded-md shadow-sm">
	          <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
	            D
	          </span>
	          <input type="text" wire:model="answers.3.title" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Неверный ответ">
	        </div>

	        <div class="px-2 sm:px-4 py-1 flex rounded-md shadow-sm">
	          <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
	            E
	          </span>
	          <input type="text" wire:model="answers.4.title" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Неверный ответ">
	        </div>

	        <button type="submit">Click</button>
	      </div>
	    </form>

		</div>
	</div>
