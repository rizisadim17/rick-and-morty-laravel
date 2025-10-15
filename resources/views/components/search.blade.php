<div class="bg-white rounded-lg shadow-md p-6 mb-8">
    <form onsubmit="handleLocationSearch(event, '{{ $baseUrl }}')">
        <div class="flex gap-3">
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="text" 
                       name="location" 
                       value="{{ $searchValue ?? '' }}" 
                       placeholder="{{ $placeholder }}"
                       class="block w-full pl-10 {{ $showButton ? 'pr-3' : 'pr-12' }} py-3 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
            </div>
            
            @if($showButton)
                <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 flex items-center">
                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    Search
                </button>
                
                @if(isset($searchValue) && $searchValue)
                    <button type="button"
                            onclick="clearText(this)"
                            class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-3 px-4 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 flex items-center"
                            title="Clear search">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                @endif
            @endif
        </div>
    </form>
</div>

@push('scripts')
<script>
function handleLocationSearch(event, baseUrl) {
    event.preventDefault();
    const locationValue = event.target.location.value.trim();
    const searchLocation = locationValue;
    window.location.href = `${baseUrl}/${encodeURIComponent(searchLocation)}`;
}
function clearText(button) {
    const form = button.closest('form');
    const input = form.querySelector('input[name="location"]');
    if (input) {
        input.value = '';
        input.focus();
    }
}
</script>
@endpush