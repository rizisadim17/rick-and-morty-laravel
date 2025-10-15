@extends('layouts.app')

@section('title', $details['name'] . ' - Location Details')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header Section --}}
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-4xl font-bold text-gray-900">{{ $details['name'] }}</h1>
                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-blue-100 text-blue-800">
                    ID: {{ $details['id'] }}
                </span>
            </div>
            
            {{-- Location Details Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-6 border border-gray-200">
                    <div class="flex items-center space-x-4 mb-2">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Type</h3>
                    </div>
                    <p class="text-xl font-bold text-gray-900">{{ $details['type'] }}</p>
                </div>
                
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-6 border border-gray-200">
                    <div class="flex items-center space-x-4 mb-2">
                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9"></path>
                        </svg>
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Dimension</h3>
                    </div>
                    <p class="text-xl font-bold text-gray-900">{{ $details['dimension'] }}</p>
                </div>
            </div>
        </div>

        {{-- Residents Section --}}
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-bold text-gray-900">Residents</h2>
                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-green-100 text-green-800">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    {{ count($characters) }} Characters
                </span>
            </div>

            <div id="character-wrapper">
                @if(isset($characters) && !empty($characters))
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                        @foreach($characters as $character)
                            <a href="{{ route('characters.show', ['id' => $character['id']]) }}">
                                <div class="relative group bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                                    {{-- Character Image Container --}}
                                    <div class="relative aspect-square overflow-hidden cursor-pointer">
                                        @if($character['image'])
                                            <img
                                                src="{{ $character['image'] }}" 
                                                alt="{{ $character['name'] }}"
                                                class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-110">
                                        @else
                                            <div class="w-full h-full bg-gradient-to-br from-gray-300 to-gray-400 flex items-center justify-center">
                                                <svg class="w-16 h-16 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                </svg>
                                            </div>
                                        @endif

                                        {{-- Hover Overlay with Character Details --}}
                                        <div class="absolute inset-0 bg-black bg-opacity-80 flex flex-col justify-center items-center p-4 opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0 transition-all duration-300 ease-out pointer-events-none">
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

                                                    @if(isset($character['episode']) && !empty($character['episode']))
                                                        <div class="flex items-center justify-center space-x-2">
                                                            <svg class="w-4 h-4 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                                            </svg>
                                                            <span class="text-sm font-medium">
                                                                {{ count($character['episode']) }}
                                                                {{ count($character['episode']) > 1 ? 'Episodes' : 'Episode' }}
                                                            </span>
                                                        </div>
                                                    @endif
                                                </div>

                                                {{-- Status Badge --}}
                                                @php
                                                    $statusColor = strtolower($character['status']) === 'alive' ? 'bg-green-500' : 
                                                                  (strtolower($character['status']) === 'dead' ? 'bg-red-500' : 'bg-gray-500');
                                                @endphp
                                                
                                                @if(isset($character['status']))
                                                    <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold text-white {{ $statusColor }}">
                                                        <span class="w-2 h-2 bg-white rounded-full mr-2 opacity-75"></span>
                                                        {{ $character['status'] }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Character Name (Always Visible) --}}
                                    <div class="p-4 bg-white">
                                        <h3 class="text-lg font-semibold text-gray-800 text-center truncate">{{ $character['name'] }}</h3>
                                        <p class="text-sm text-gray-500 text-center mt-1">{{ $character['species'] }}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    @if($pagination['total_pages'] > 1)
                       @include('components.pagination', ['pagination' => $pagination])
                    @endif
                @else
                    <div class="text-center py-16">
                        <div class="text-gray-400 mb-6">
                            <svg class="w-20 h-20 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-semibold text-gray-600 mb-2">No Characters Found</h2>
                        <p class="text-gray-500">No characters were found for this location.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection