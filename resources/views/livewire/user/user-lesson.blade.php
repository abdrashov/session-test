  <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Мои тесты') }}
      </h2>
    </div>
  </x-slot>

  <div class="py-12"> 
  	<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<form>
  <x-jet-button wire:click="$toggle('modal')" wire:loading.attr="disabled">
    Добавить дисциплину
  </x-jet-button>
      
  <x-jet-dialog-modal wire:model="modal">
    <x-slot name="title">
      Добавить дисциплину
    </x-slot>

    <x-slot name="content">
        <div class="mb-2">
          <x-jet-label for="code" value="{{ __('Код') }}" />
          <x-jet-input wire:model="code" id="code" class="block mt-1 w-full" type="text" required {{ $code ? 'disabled' : ''}}/>
          <x-jet-input-error for="code" class="mt-2" />
        </div>
        <div>
          <x-jet-label for="title" value="{{ __('Дисциплина') }}" />
          <x-jet-input wire:model="title" id="title" class="block mt-1 w-full" type="text" required autofocus/>
          <x-jet-input-error for="title" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="footer">
      <x-jet-secondary-button wire:click="$toggle('modal')" wire:loading.attr="disabled">
        Отмена
      </x-jet-secondary-button>

      <x-jet-button class="ml-2" wire:click="store" type="button" wire:loading.attr="disabled">
        Добавить
      </x-jet-button>
    </x-slot>
  </x-jet-dialog-modal>
</form>  
      <div class="overflow-hidden sm:rounded-lg">
        <div class="flex flex-col">
          <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
              <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
	              <table class="min-w-full divide-y divide-gray-200">
	                <thead class="bg-gray-50">
	                  <tr>
	                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
	                    	#
	                    </th>
	                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
	                      Дисциплина
	                    </th>
	                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
	                      Вопросы
	                    </th>
	                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
	                      Статус
	                    </th>
	                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
	                      Дата
	                    </th>
	                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
	                      Тест
	                    </th>
	                  </tr>
	                </thead>
	                <tbody class="bg-white divide-y divide-gray-200">
                    {{-- @foreach($ratings as $rating)
                      <tr>
                        <td class="px-4 py-4">
                          <div class="text-sm font-medium text-gray-900">
                            {{ (($ratings->perPage()*$ratings->currentPage())-$ratings->perPage())+$loop->iteration }}
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900">
                            {{ $rating->lesson->title }}
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            {{ $rating->tests->count() }}
                          </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ ($rating->status == 1) ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} ">
                            {{ ($rating->status == 1) ? 'active' : 'not active' }}
                          </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900">
                            {{ $rating->created_at->format('d.m.Y') }}
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          <a href="{{ route( ($rating->status == 1) ? 'dashboard.test' : 'dashboard.result', $rating->code) }}" class="text-indigo-600 hover:text-indigo-900">
                            {{ ($rating->status == 1) ? 'Сдать' : 'Резултать' }} 
                          </a>
                        </td>
                      </tr>
                    @endforeach --}}

	                  <!-- More items... -->
	                </tbody>
	              </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>