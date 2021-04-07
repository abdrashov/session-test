<x-app-layout>
  
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="overflow-hidden sm:rounded-lg border-b border-gray-200 shadow">
        <div class="flex flex-col">
          <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
              <div class="overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                  <thead class="bg-gray-50">
                    <tr>
                      <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        #
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Дисциплина
                      </th>
                      <th scope="col" colspan="2" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Вопросы
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Тест
                      </th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($lessons as $lesson)
                    <tr>
                      <td class="px-4 py-4">
                        <div class="text-sm font-medium text-gray-900">
                          {{ (($lessons->perPage()*$lessons->currentPage())-$lessons->perPage())+$loop->iteration }}
                        </div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">
                          {{ $lesson->title }}
                        </div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                          {{ $lesson->questions->count() }}
                        </span>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <a href="{{ route('lesson.show' , $lesson->code) }}" class="text-indigo-600 hover:text-indigo-900">
                          Посмотреть все вопросы
                        </a>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <form action="{{ route('lesson.add.user') }}" method="post">
                          @method('PUT')
                          @csrf
                          <input name="id" type="hidden" value="{{ $lesson->id }}">
                          <button class="text-indigo-600 hover:text-indigo-900">
                            Добавить себе
                          </button>
                        </form>
                      </td>
                    </tr>
                    @endforeach

                    <!-- More items... -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="bg-gray-50 px-4 py-3 border-t border-gray-200 sm:px-6">
          {{ $lessons->links() }}
        </div>

      </div>
    </div>
  </div>
  
</x-app-layout>
