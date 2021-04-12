
<div {!! $attributes->merge(['class' => 'grid grid-cols-3 gap-4']) !!}>
	<dt class="text-sm font-medium text-gray-700 sm:col-span-1 col-span-2">
		{{ $header }}
	</dt>
	<dd class="text-sm font-semibold text-gray-900 sm:col-span-2">
		{{ $slot }}
	</dd>
</div>