<a href="{{ route('characters.show', $character['id']) }}">
    <div class="relative group bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden"
         data-controller="character-toggle">
        <div class="relative aspect-square overflow-hidden cursor-pointer"
             data-target="container">
            @if($character['image'])
                <img src="{{ $character['image'] }}" 
                     alt="{{ $character['name'] }}"
                     data-target="image"
                     class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-110">
            @else
                <div class="w-full h-full bg-gradient-to-br from-gray-300 to-gray-400 flex items-center justify-center">
                    <svg class="w-16 h-16 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
            @endif

            <!-- Hover Overlay -->
            <div class="absolute inset-0 bg-black bg-opacity-80 flex flex-col justify-center items-center p-4 opacity-0 translate-y-2 transition-all duration-300 ease-out pointer-events-none"
                 data-target="overlay">
                <div class="text-center text-white space-y-3">
                    <h3 class="text-xl font-bold text-white leading-tight">{{ $character['name'] }}</h3>
                    
                    <div class="space-y-2">
                        <div class="flex items-center justify-center space-x-2">
                            <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 8.172V5L8 4z"></path>
                            </svg>
                            <span class="text-sm font-medium">{{ $character['species'] }}</span>
                        </div>
                        
                        <div class="flex items-center justify-center space-x-2">
                            <svg class="w-4 h-4 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="text-sm font-medium">{{ $character['gender'] }}</span>
                        </div>
                    </div>

                    @php
                        $statusColor = strtolower($character['status']) === 'alive' ? 'bg-green-500' : 
                                      (strtolower($character['status']) === 'dead' ? 'bg-red-500' : 'bg-gray-500');
                    @endphp
                    
                    @if($character['status'])
                        <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold text-white {{ $statusColor }}">
                            <span class="w-2 h-2 bg-white rounded-full mr-2 opacity-75"></span>
                            {{ $character['status'] }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Character Name -->
        <div class="p-4 bg-white">
            <h3 class="text-lg font-semibold text-gray-800 text-center truncate">{{ $character['name'] }}</h3>
            <p class="text-sm text-gray-500 text-center mt-1">{{ $character['species'] }}</p>
        </div>
    </div>
</a>