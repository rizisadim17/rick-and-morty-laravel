@extends('layouts.app')

@section('title', 'Characters')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    @if(!empty($data))
        <h1 class="text-4xl font-bold text-gray-800 mb-8 text-center">Characters</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
            @foreach($data as $character)
                @include('components.character-card', ['character' => $character])
            @endforeach
        </div>
    @else
        <div class="text-center py-16">
            <h2 class="text-2xl font-semibold text-gray-600 mb-2">No Characters Found</h2>
        </div>
    @endif
</div>
@endsection