<nav class="bg-gradient-to-r from-blue-900 via-purple-900 to-green-900 shadow-lg border-b-2 border-green-400">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo/Brand -->
            <div class="flex items-center">
                <div class="text-green-400 text-xl font-bold">
                    🛸 Rick & Morty Portal
                </div>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <a  href="{{ route('locations.search-dimension') }}"
                        
                        class="px-3 py-2 rounded-md text-sm font-medium transition-all duration-200 
                              {{ request()->routeIs('locations.search-dimension', 'locations.characters-by-dimension') ? 'bg-green-600 text-white shadow-lg' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                        🌌 Dimensions
                    </a>
                    <a href="{{ route('locations.search-location') }}"
                        
                        class="px-3 py-2 rounded-md text-sm font-medium transition-all duration-200 
                              {{ request()->routeIs('locations.search-location', 'locations.characters-by-location', 'locations.show') ? 'bg-green-600 text-white shadow-lg' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                        📍 Locations
                    </a>
                    <a href="{{ route('characters.index') }}"
                        
                        class="px-3 py-2 rounded-md text-sm font-medium transition-all duration-200 
                              {{ request()->routeIs('characters.index', 'characters.show') ? 'bg-green-600 text-white shadow-lg' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                        👥 Characters
                    </a>
                    <a href="{{ route('episodes.index') }}"
                        
                       class="px-3 py-2 rounded-md text-sm font-medium transition-all duration-200 
                              {{ request()->routeIs('episodes.index', 'episodes.show') ? 'bg-green-600 text-white shadow-lg' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                        📺 Episodes
                    </a>
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button id="mobile-menu-btn"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-label="Toggle menu">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-gray-800">
            <a href="{{ route('locations.search-dimension') }}"
                
                class="block px-3 py-2 rounded-md text-base font-medium w-full text-left
                      {{ request()->routeIs('locations.search-dimension', 'locations.characters-by-dimension') ? 'text-white bg-green-600' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                🌌 Dimensions
            </a>
            <a href="{{ route('locations.search-location') }}"
                
                class="block px-3 py-2 rounded-md text-base font-medium w-full text-left
                      {{ request()->routeIs('locations.search-location', 'locations.characters-by-location') ? 'text-white bg-green-600' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                📍 Locations
            </a>
            <a href="{{ route('characters.index') }}"
                
                class="block px-3 py-2 rounded-md text-base font-medium w-full text-left
                      {{ request()->routeIs('characters.index', 'characters.show') ? 'text-white bg-green-600' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                👥 Characters
            </a>
            <a href="{{ route('episodes.index') }}"
                
                class="block px-3 py-2 rounded-md text-base font-medium w-full text-left
                      {{ request()->routeIs('episodes.index', 'episodes.show') ? 'text-white bg-green-600' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                📺 Episodes
            </a>
        </div>
    </div>
</nav>

@push('scripts')
<script>
    document.getElementById('mobile-menu-btn').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>
@endpush