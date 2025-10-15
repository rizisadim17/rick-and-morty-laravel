@extends('layouts.app')

@section('title', $data['episode'])

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    @if(!empty($data))
        {{-- Episode Header Section --}}
        <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-xl p-6 border border-gray-200">
            <div class="px-8 py-12">
                <div class="text-center">
                    <div class="inline-flex items-center px-4 py-2 bg-white bg-opacity-80 rounded-full text-sm font-semibold mb-4 text-gray-800 shadow-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2M7 4h10M7 4v16a2 2 0 002 2h6a2 2 0 002-2V4M11 6h2M9 10h6M9 14h6"></path>
                        </svg>
                        {{ $data['episode'] }}
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold mb-4 leading-tight text-gray-900">{{ $data['name'] }}</h1>
                    <div class="flex items-center justify-center space-x-2 text-lg text-gray-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span class="font-medium">Aired: {{ date('F j, Y', strtotime($data['air_date'])) }}</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Characters Section --}}
        <div class="mb-8 mt-8">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-bold text-gray-800 flex items-center">
                    <svg class="w-8 h-8 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    Characters
                </h2>
                @if(!empty($characters))
                    <div class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">
                        {{ count($characters) }} character{{ count($characters) != 1 ? 's' : '' }}
                    </div>
                @endif
            </div>

            @if(!empty($characters))
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                    @foreach($characters as $character)
                        <a href="{{ route('characters.show', ['id' => $character['id']]) }}">
                            <div 
                                class="relative group bg-white rounded-xl shadow-lg transition-all duration-300 transform overflow-hidden"
                                data-controller="character-toggle"
                                data-character-toggle-name-value="{{ $character['name'] }}">
                                {{-- Character Image Container --}}
                                <div 
                                    class="relative aspect-square overflow-hidden cursor-pointer"
                                    data-target="container">
                                    @if($character['image'])
                                        <img 
                                            src="{{ $character['image'] }}" 
                                            alt="{{ $character['name'] }}"
                                            class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-110"
                                            data-target="image">
                                    @else
                                        <div 
                                            class="w-full h-full bg-gradient-to-br from-gray-300 to-gray-400 flex items-center justify-center"
                                            data-target="image">
                                            <svg class="w-16 h-16 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        </div>
                                    @endif

                                    {{-- Hover Overlay with Character Details --}}
                                    <div 
                                        data-target="overlay"
                                        class="absolute inset-0 bg-black bg-opacity-80 flex flex-col justify-center items-center p-4 opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0 transition-all duration-300 ease-out pointer-events-none">
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

                                            {{-- Status Badge --}}
                                            @if(isset($character['status']))
                                                @php
                                                    $statusColor = strtolower($character['status']) === 'alive' ? 'bg-green-500' : 
                                                                  (strtolower($character['status']) === 'dead' ? 'bg-red-500' : 'bg-gray-500');
                                                @endphp
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
            @else
                <div class="text-center py-16 bg-white rounded-xl shadow-lg">
                    <div class="text-gray-400 mb-6">
                        <svg class="w-20 h-20 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-600 mb-2">No Characters Found</h3>
                    <p class="text-gray-500">No characters appear in this episode.</p>
                </div>
            @endif
        </div>
        @if(isset($pagination) && $pagination['total_pages'] > 1)
            @include('components.pagination', ['pagination' => $pagination])
        @endif
    @else
        {{-- No Episode Found State --}}
        <div class="text-center py-20">
            <div class="text-gray-400 mb-8">
                <svg class="w-24 h-24 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-700 mb-4">Episode Not Found</h1>
            <p class="text-gray-500 text-lg mb-8">The episode you're looking for doesn't exist or has been removed.</p>
        </div>
    @endif
</div>
@endsection