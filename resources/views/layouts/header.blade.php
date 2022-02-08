<div class="py-8">

<nav class="bg-gray-100 fixed top-0 h-16 inset-x-0 z-40">
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between mt-4">
            <div>
                <a href="/">
                    <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                </a>
            </div>
            <div>
                <input type="text" placeholder="Searchbar">
            </div>
            @if (Route::has('login'))
                <div class="flex items-center mr-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</nav>

</div>