<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TouriStay 2030 - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="text-blue-600 text-xl font-bold">TouriStay 2030</a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:ml-6 sm:flex sm:items-center space-x-4">
                    @auth
                        @if(Auth::user()->role === 'owner')
                            <a href="{{ route('owner.listings.index') }}" class="text-gray-600 hover:text-blue-600 px-3 py-2 text-sm font-medium">My Listings</a>
                            <a href="{{ route('owner.listings.create') }}" class="text-gray-600 hover:text-blue-600 px-3 py-2 text-sm font-medium">Create Listing</a>
                        @else
                            <a href="{{ route('tourist.listings.index') }}" class="text-gray-600 hover:text-blue-600 px-3 py-2 text-sm font-medium">Browse Listings</a>
                            <a href="{{ route('tourist.favorites.index') }}" class="text-gray-600 hover:text-blue-600 px-3 py-2 text-sm font-medium">Favorites</a>
                        @endif
                    @endauth
                </div>

                <!-- Profile Dropdown -->
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    @auth
                        <div class="ml-3 relative">
                            <a href="{{ route('owner.listings.show') }}" class="flex items-center text-gray-600 hover:text-blue-600">
                                <span class="mr-2 text-sm font-medium">{{ Auth::user()->name }}</span>
                                <svg class="h-8 w-8 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 14.25c3.73 0 6.75-3.02 6.75-6.75S15.73.75 12 .75 5.25 3.77 5.25 7.5 8.27 14.25 12 14.25zm0-12c2.9 0 5.25 2.35 5.25 5.25S14.9 12.75 12 12.75 6.75 10.4 6.75 7.5 9.1 2.25 12 2.25z"/>
                                    <path d="M20.25 23.25H3.75c-.41 0-.75-.34-.75-.75 0-5.38 4.37-9.75 9.75-9.75s9.75 4.37 9.75 9.75c0 .41-.34.75-.75.75zm-15.75-1.5h15c-.44-4.15-3.95-7.5-8.25-7.5s-7.81 3.35-8.25 7.5z"/>
                                </svg>
                            </a>
                        </div>
                        <form method="POST" action="{{ route('logout') }}" class="ml-4">
                            @csrf
                            <button type="submit" class="text-gray-600 hover:text-blue-600 text-sm font-medium">Logout</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="fixed bottom-4 right-4 bg-red-500 text-white px-4 py-2 rounded-lg shadow-lg">
            {{ session('error') }}
        </div>
    @endif
</body>
</html>
