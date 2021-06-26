<x-app>
	@auth
		@include('_publish-tweet-panel')
	@endauth
	@include('_timeline')
</x-app>