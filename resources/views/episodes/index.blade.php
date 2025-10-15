@extends('layouts.app')

@section('title', 'Episodes')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Episodes</h1>
        <p class="text-gray-600">Browse through all available episodes</p>
    </div>

    <div id="dimension-wrapper" class="space-y-4">
        @if(!empty($data))
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <ul class="divide-y divide-gray-200">
                    @foreach($data as $episode)
                        <li class="hover:bg-gray-50 transition-colors duration-200">
                            <a
                                href="{{ route('episodes.show', ['id' => $episode['id']]) }}"
                                
                                class="block px-6 py-4 hover:bg-blue-50 transition-all duration-200 group"
                            >
                                <div class="flex items-center justify-between">
                                    <div class="flex-1">
                                        <div class="flex items-center space-x-3">
                                            <div class="flex-shrink-0">
                                                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center group-hover:bg-blue-200 transition-colors duration-200">
                                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h1m4 0h1M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <h3 class="text-lg font-semibold text-gray-900 group-hover:text-blue-700 transition-colors duration-200">
                                                    {{ $episode['name'] }}
                                                </h3>
                                                <div class="flex items-center space-x-4 mt-1">
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                        Episode {{ $episode['episode'] }}
                                                    </span>
                                                    <span class="text-sm text-gray-500 flex items-center">
                                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                        </svg>
                                                        {{ date('M d, Y', strtotime($episode['air_date'])) }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0 ml-4">
                                        <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-500 transition-colors duration-200" 
                                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            
            {{-- Episode count --}}
            <div class="text-center mt-6">
                <p class="text-sm text-gray-500">
                    Showing {{ count($data) }} episode{{ count($data) != 1 ? 's' : '' }}
                </p>
            </div>
        @else
            <div class="bg-white rounded-lg shadow-lg">
                <div class="text-center py-16 px-6">
                    <div class="text-gray-400 mb-6">
                        <svg class="w-20 h-20 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" 
                                  d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">No Episodes Available</h3>
                    <p class="text-gray-500 text-base max-w-sm mx-auto">
                        There are currently no episodes to display. Check back later for new content.
                    </p>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection