
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
	<div class="overflow-hidden sm:rounded-lg border-b border-gray-200 shadow">
		<div class="flex flex-col">
			<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
				<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
					<div class="overflow-hidden">
						{{ $slot }}
					</div>
				</div>
			</div>
		</div>
		{{ $footer ?? '' }}
	</div>
</div>
