<x-guest-layout>
	<div class="py-14 bg-gray-50">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

			<p class="mb-3 text-base text-gray-900 md:text-xl ">
				Чтобы пройти пробные тесты, вам необходимо зарегистрироваться в системе
			</p>

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
											<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
												Вопросы
											</th>
											<th scope="col" colspan="3" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
												Дата создания
											</th>
										</tr>
									</thead>
									<tbody class="bg-white divide-y divide-gray-200">
										@foreach($lessons as $lesson)

										<tr>
											<td class="px-4 py-4">
												<div class="text-sm font-medium text-gray-900">
													{{ $loop->iteration }}
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
											<td class="px-6 py-4 whitespace-nowrap">
												<div class="text-sm text-gray-900">
													{{ $lesson->created_at->format('d/m/Y') }}
												</div>
											</td>
											<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
												<a href="{{ route('g.lesson.show' , $lesson->code) }}" class="text-indigo-600 hover:text-indigo-900">
													Подробнее
												</a>
											</td>
											<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
												<a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-900">
													Не доступен
												</a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-guest-layout>