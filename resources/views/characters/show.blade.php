@extends('layouts.app')

@section('title', $data['name'])

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-2xl shadow-2xl border border-gray-200 overflow-hidden">
            {{-- Header Section --}}
            <div class="bg-gradient-to-r from-green-400 to-blue-500 p-6">
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        <img src="{{ $data['image'] }}" 
                             alt="{{ $data['name'] }}" 
                             class="w-32 h-32 rounded-full border-4 border-white shadow-lg object-cover">
                        @php
                            $statusColor = strtolower($data['status']) === 'alive' ? 'bg-green-500' : 
                                          (strtolower($data['status']) === 'dead' ? 'bg-red-500' : 'bg-gray-500');
                        @endphp
                        @if(isset($data['status']))
                            <div class="absolute -bottom-2 -right-2 {{ $statusColor }} text-white px-3 py-1 rounded-full text-sm font-bold shadow-lg">
                                {{ $data['status'] }}
                            </div>
                        @endif
                    </div>
                    <div class="text-white">
                        <h1 class="text-4xl font-bold mb-2 text-white">{{ $data['name'] }}</h1>
                        <div class="flex flex-wrap gap-3">
                            <span class="bg-white/30 backdrop-blur px-3 py-1 rounded-full text-sm text-white font-medium">
                                🧬 {{ $data['species'] }}
                            </span>
                            <span class="bg-white/30 backdrop-blur px-3 py-1 rounded-full text-sm text-white font-medium">
                                @if($data['gender'] == 'Male')👨@elseif($data['gender'] == 'Female')👩@else👤@endif {{ $data['gender'] }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Main Content --}}
            <div class="p-6 space-y-6">
                {{-- Location Information --}}
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                            <span class="mr-2">📍</span> Current Location
                        </h3>
                        <div class="text-gray-600">
                            @if($data['location'] && $data['location']['url'])
                                @php
                                    $locationNumber = basename($data['location']['url']);
                                @endphp
                                <a href="{{ route('locations.show', ['id' => $locationNumber]) }}"
                                    class="text-blue-600 underline hover:text-blue-700 transition-colors inline-flex items-center gap-1">
                                    <p class="text-lg font-medium">{{ $data['location']['name'] }}</p>
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                </a>
                            @else
                                <p class="text-sm italic text-gray-500">No known location for this character.</p>
                            @endif
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                            <span class="mr-2">🌍</span> Origin
                        </h3>
                        <div class="text-gray-600">
                            @if($data['origin'] && $data['origin']['url'])
                                @php
                                    $originNumber = basename($data['origin']['url']);
                                @endphp
                                <a href="{{ route('locations.show', ['id' => $originNumber]) }}"
                                    class="text-blue-600 underline hover:text-blue-700 transition-colors inline-flex items-center gap-1">
                                    <p class="text-lg font-medium">{{ $data['origin']['name'] }}</p>
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                </a>
                            @else
                                <p class="text-sm italic text-gray-500">No known origin for this character.</p>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Episodes Section --}}
                <div class="bg-gray-50 rounded-xl border border-gray-200" id="episodes-section">
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                                <span class="mr-2">📺</span> Episodes
                                <span class="ml-2 bg-blue-500 text-white px-2 py-1 rounded-full text-sm">
                                    {{ count($data['episode']) }}
                                </span>
                            </h3>
                            <button onclick="toggleEpisodes()"
                                    id="toggleButton"
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors flex items-center space-x-2">
                                <span id="toggleText">Show Episodes</span>
                                <svg id="toggleIcon" 
                                     class="w-4 h-4 transform transition-transform" 
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div id="episodesContent" class="hidden">
                        <div class="p-6">
                            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-3">
                                @foreach($data['episode'] as $episodeUrl)
                                    @php
                                        $episodeNumber = basename($episodeUrl);
                                    @endphp
                                    <a href="{{ route('episodes.show', ['id' => $episodeNumber]) }}"
                                       class="bg-white/10 hover:bg-white/20 backdrop-blur rounded-lg p-4 border border-white/10 transition-all duration-200 hover:scale-105 group">
                                        <div class="flex items-center space-x-3">
                                            <div class="bg-gradient-to-r from-pink-500 to-violet-500 w-10 h-10 rounded-full flex items-center justify-center text-white font-bold text-sm">
                                                {{ $episodeNumber }}
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="font-medium group-hover:text-blue-300 transition-colors">
                                                    Episode {{ $episodeNumber }}
                                                </p>
                                            </div>
                                            <svg class="w-4 h-4 text-gray-400 group-hover:text-blue-300 transition-colors" 
                                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                            </svg>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Character Stats --}}
                <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-xl p-6 border border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Character Summary</h3>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-3 text-center">
                        <div class="bg-white rounded-lg p-4 border border-gray-200 shadow-sm">
                            <div class="text-2xl font-bold text-gray-800">{{ count($data['episode']) }}</div>
                            <div class="text-gray-600 text-sm">Episodes</div>
                        </div>
                        @php
                            $statusTextColor = strtolower($data['status']) === 'alive' ? 'text-green-600' : 
                                              (strtolower($data['status']) === 'dead' ? 'text-red-600' : 'text-gray-600');
                        @endphp
                        <div class="bg-white rounded-lg p-4 border border-gray-200 shadow-sm">
                            <div class="text-2xl font-bold {{ $statusTextColor }}">{{ $data['status'] }}</div>
                            <div class="text-gray-600 text-sm">Status</div>
                        </div>
                        <div class="bg-white rounded-lg p-4 border border-gray-200 shadow-sm">
                            <div class="text-2xl font-bold text-blue-600">{{ $data['species'] }}</div>
                            <div class="text-gray-600 text-sm">Species</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function toggleEpisodes() {
    const content = document.getElementById('episodesContent');
    const icon = document.getElementById('toggleIcon');
    const text = document.getElementById('toggleText');
    
    content.classList.toggle('hidden');
    icon.classList.toggle('rotate-180');
    text.textContent = content.classList.contains('hidden') ? 'Show Episodes' : 'Hide Episodes';
}
</script>
@endpush
@endsection