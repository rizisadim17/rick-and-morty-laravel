@extends('layouts.app')

@section('title', 'Error')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto text-center">
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <div class="text-6xl mb-4">🛸</div>
            <h1 class="text-3xl font-bold text-gray-900 mb-4">Portal Malfunction</h1>
            <p class="text-gray-600 mb-6">{{ $message ?? 'Something went wrong. The interdimensional portal is experiencing technical difficulties.' }}</p>
            <div class="space-x-4">
                <a href="{{ url()->previous() }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition-colors">
                    Go Back
                </a>
                <a href="{{ route('characters.index') }}" class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-3 rounded-lg transition-colors">
                    Home
                </a>
            </div>
        </div>
    </div>
</div>
@endsection