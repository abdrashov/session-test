<x-guest-layout>


	<div class="container px-5 py-8 mx-auto">
		<h1 class="text-2xl tracking-tight font-semibold text-gray-800 md:text-3xl">
			<span class="block xl:inline">Дисциплины и тесты</span>
		</h1>
	</div>
	<section class="text-gray-600 body-font overflow-hidden">
		<div class="container px-5 pb-24 mx-auto">
			<div class="-my-8 divide-y-2 divide-gray-100">
				@foreach($lessons as $lesson)
				<div class="py-8 flex flex-wrap md:flex-nowrap">
					<div class="md:w-64 md:mb-0 mb-2 flex-shrink-0 flex flex-col">
						<span class="font-semibold title-font text-gray-700">ДАТА СОЗДАНИЯ</span>
						<span class="mt-1 text-gray-500 text-sm">{{ $lesson->created_at->format('d/m/Y') }}</span>
					</div>
					<div class="md:flex-grow">
						<h2 class="text-2xl font-medium text-gray-900 title-font mb-2">{{ $lesson->title }}</h2>
						<p class="leading-relaxed">
							<a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-gray-900">
								Не доступен. 
							</a>
							Чтобы пройти пробные тесты, вам необходимо 
							<a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900">
								зарегистрироваться
							</a>
							в системе.
						</p>

						<a href="{{ route('lesson.show' , $lesson->code) }}" class="text-indigo-500 inline-flex items-center mt-4">Подробнее
							<svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
								<path d="M5 12h14"></path>
								<path d="M12 5l7 7-7 7"></path>
							</svg>
						</a>
					</div>
				</div>
				@endforeach

			</div>
		</div>
	</section>

</x-guest-layout>