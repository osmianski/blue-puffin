<header class="bg-white">
    <nav class="container mx-auto flex items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            @auth
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <button type="button" class="rounded-full bg-white p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        <span class="sr-only">View notifications</span>
                        <x-heroicons::outline.bell class="h-6 w-6" />
                    </button>

                    <!-- Profile dropdown -->
                    <div x-data="{ open: false }" class="relative ml-3">
                        <div>
                            <button type="button" class="flex max-w-xs items-center rounded-full bg-white text-gray-400 hover:text-gray-500 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <x-heroicons::solid.user class="h-8 w-8" />
                            </button>
                        </div>

                        <!--
                          Dropdown menu, show/hide based on menu state.

                          Entering: "transition ease-out duration-200"
                            From: "transform opacity-0 scale-95"
                            To: "transform opacity-100 scale-100"
                          Leaving: "transition ease-in duration-75"
                            From: "transform opacity-100 scale-100"
                            To: "transform opacity-0 scale-95"
                        -->
                        <div x-show="open" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <span class="block px-4 py-2 text-sm text-gray-400" role="menuitem" tabindex="-1">{{ __('Your Profile') }}</span>
                            <span class="block px-4 py-2 text-sm text-gray-400" role="menuitem" tabindex="-1">{{ __('Settings') }}</span>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1">{{ __('Sign out') }}</a>
                            </form>
                        </div>
                    </div>
                </div>
            @endauth

            @guest
                <a href="{{ route('login')}}" class="text-sm font-semibold leading-6 text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a>
            @endguest
        </div>
    </nav>
</header>
