<div class="border border-gray-300 rounded-lg">
	@forelse ($tweets as $tweet)
		@include('_tweet') 
	@empty
	<p class="p-4">No tweets yet.</p>
	@endforelse
</div>
<div class="border rounded-lg mt-2 p-2">{{ $tweets->links() }}</div>