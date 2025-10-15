@if($pagination['total_pages'] > 1)
    <div class="mt-12 flex justify-center items-center space-x-4" style="margin-top: 32px;">
        @php
            $prevClasses = $pagination['has_prev'] ? 
                'px-6 py-2 text-sm text-gray-700 bg-white border border-gray-200 rounded-full hover:bg-gray-50 hover:border-gray-300 transition-all shadow-sm' :
                'px-6 py-2 text-sm text-gray-400 bg-gray-100 border border-gray-200 rounded-full cursor-not-allowed opacity-50';
        @endphp
        
        @if($pagination['has_prev'])
            <a href="{{ request()->fullUrlWithQuery(['page' => $pagination['current_page'] - 1]) }}"
                class="{{ $prevClasses }}">
                Previous
            </a>
        @else
            <span class="{{ $prevClasses }}">Previous</span>
        @endif
        
        <span class="px-4 py-2 text-sm text-gray-500 bg-gray-100 rounded-full">
            Page {{ $pagination['current_page'] }} of {{ $pagination['total_pages'] }}
        </span>
        
        @php
            $nextClasses = $pagination['has_next'] ? 
                'px-6 py-2 text-sm text-gray-700 bg-white border border-gray-200 rounded-full hover:bg-gray-50 hover:border-gray-300 transition-all shadow-sm' :
                'px-6 py-2 text-sm text-gray-400 bg-gray-100 border border-gray-200 rounded-full cursor-not-allowed opacity-50';
        @endphp
        
        @if($pagination['has_next'])
            <a href="{{ request()->fullUrlWithQuery(['page' => $pagination['current_page'] + 1]) }}"
                class="{{ $nextClasses }}">
                Next
            </a>
        @else
            <span class="{{ $nextClasses }}">Next</span>
        @endif
    </div>
    <div class="mt-4 text-center text-sm text-gray-500">
        Total: {{ $pagination['total_characters'] }} characters
    </div>
@endif