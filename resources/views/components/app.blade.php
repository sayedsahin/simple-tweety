<x-master>
    <section>
        <div class="font-sans text-gray-900 antialiased">
            <div class="lg:flex lg:justify-center">
                <div class="lg:w-32">
                    @include('_sidebar-links')
                </div>
                <div class="lg:flex-1 lg:mx-10" style="max-width:700px">
                    {{ $slot }}
                </div>
                <div class="lg: w-1/6 bg-blue-100 rounded-lg p-4">
                    @auth
                    @include('_friends-list')
                    @endauth
                </div>
            </div>
        </div>
    </section>
</x-master>