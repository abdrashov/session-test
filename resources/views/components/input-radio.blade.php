@props(['answer' => null])

<div class="py-2 px-3 sm:px-6 w-full block">
	<input id="answer{{ $answer }}" type="radio" class="form-radio" {{ $attributes }} value="{{ $answer }}"> &nbsp;
	<label for="answer{{ $answer }}" class="break-words inline text-sm text-gray-900">
		{{ $slot }}
	</label>
</div>