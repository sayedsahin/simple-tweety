<ul>
	<li>
		<a class="font-bold text-lg mb-4 block" href="{{ route('home') }}">Home</a>
	</li>

	<li>
		<a class="font-bold text-lg mb-4 block" href="/explore">Explore</a>
	</li>

	@auth
		<li>
			<a class="font-bold text-lg mb-4 block" href="{{ route('profile', auth()->user()) }}">Profile</a>
		</li>
		<li>
			<a class="font-bold text-lg mb-4 block" href="{{ route('dashboard') }}">Dashboard</a>
		</li>

		<li>
			<form method="POST" action="{{ route('logout') }}">
				@csrf

				<button class="font-bold text-lg" 
				onclick="
				event.preventDefault();
                this.closest('form').submit();
                ">Logout</button>
			</form>
		</li>
	@endauth
	@guest()
	    <li>
			<a class="font-bold text-lg mb-4 block" href="{{ route('login') }}">Login</a>
		</li>
	@endguest
</ul>