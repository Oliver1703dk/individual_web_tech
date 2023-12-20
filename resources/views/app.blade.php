<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield("title")</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @yield("head")

</head>
<body>
<header>
    <nav class="bg-amber-400 border-gray-200 px-4 lg:px-6 py-2.5">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">

            <form action="{{ route('index') }}" method="get">
                <button type="submit" class="flex items-center">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo"/>
                    <span class="self-center text-xl font-semibold whitespace-nowrap">AllYouNeedPC</span>
                </button>
            </form>


            <form>
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                           class="block w-[35rem] p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Search Computer, Laptop..." required>
                    <button type="submit"
                            class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                        Search
                    </button>
                </div>
            </form>


            <div class="flex items-center lg:order-2">
                @guest()
                @endguest

                    <form method="GET" action={{route('productsCatalog')}}>
                        @csrf
                        <label>
                            <button type = "submit" class="text-gray-800 hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2">
                                Products
                            </button>
                        </label>

                    </form>
                @auth()
                        @if(auth()->user() && auth()->user()->admin)
                            <form method="GET" action={{route('productPageAdmin')}}>
                                @csrf
                                <label>
                                    <button type = "submit" class="text-gray-800 hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2">
                                        Admin page
                                    </button>
                                </label>
                            </form>
                        @endif
                @endauth

                @guest()

                @endguest
                @auth()
                    <form method="GET" action={{route('profile')}}>
                        @csrf
                        <label>
                            <button type = "submit" class="text-gray-800 hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2">
                                Profile
                            </button>
                        </label>
                    </form>
                @endauth
                @guest()

                @endguest
                @auth()
                    <form method="GET" action={{route('cart')}}>
                        @csrf
                        <label>
                            <button type = "submit" class="text-gray-800 hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2">
                                Cart
                            </button>
                        </label>

                    </form>
                @endauth
                @guest()
                    <a href="login"
                       class="text-gray-800 hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2">
                        Log in
                    </a>
                @endguest
                @auth()
                    <form method="POST" action={{route('logoutPost')}}>
                        @csrf
                        <label>
                            <button type = "submit" class="text-gray-800 hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2">
                                Sign out
                            </button>
                        </label>

                    </form>
                @endauth
            </div>
        </div>
    </nav>
</header>


<main>
    @yield('content')
</main>

<footer class="bg-[#141414] text-white p-4 bottom-0 left-0 w-full">
    <p>&copy; 2023 Computer Store</p>
</footer>

</body>
</html>

