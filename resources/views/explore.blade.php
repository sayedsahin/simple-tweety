<x-app>
	<div>
		@foreach ($users as $user)
		<div class="flex items-center mb-5">
			<img src="{{ $user->profile_photo_url }}" alt="" width="60" class="mr-4">
			<div>
				<h4 class="font-bold">
					<a href="{{ route('profile', $user) }}">{{ '@'.$user->username }}</a>
				</h4>
			</div>
		</div>
		@endforeach
	</div>
	<div class="border rounded-lg mt-2 p-2">{{ $users->links() }}</div>
</x-app>