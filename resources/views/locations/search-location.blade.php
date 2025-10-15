@extends('layouts.app')

@section('title', 'Characters by Location')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    @include('components.search', [
        'searchValue' => $search ?? '',
        'baseUrl' => '/characters/location',
        'showButton' => true,
        'placeholder' => 'Search by location (e.g., earth, citadel)...'
    ])
    
    @if(isset($characters) && count($characters) > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
            @foreach($characters as $character)
                @include('components.character-card', ['character' => $character])
            @endforeach
        </div>
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
    
    @if(isset($pagination) && $pagination['total_pages'] > 1)
        @include('components.pagination', ['pagination' => $pagination])
    @endif
</div>
@endsection