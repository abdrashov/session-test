@props(['bg' => false])

<div class="flex">
	<span class="{!! $bg ? 'bg-green-100' : 'bg-red-100' !!} inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 text-gray-500 text-sm">
		{{ $slot }}
	</span>
	<input {!! $attributes->merge(['class' => 'focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300']) !!} type="text">
</div>