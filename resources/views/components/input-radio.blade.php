@props(['answer' => null])

<div class="px-4 flex items-center">
	<input id="answer{{ $answer }}" type="radio" class="form-radio" {{ $attributes }} value="{{ $answer }}">
	<label for="answer{{ $answer }}" class="pl-2 inline-block py-4 text-sm text-gray-900">
		{{ $slot }}
	</label>
</div>