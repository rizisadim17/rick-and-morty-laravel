const loaderHTML = `
    <div id="ajax-loader" class="fixed inset-0 bg-gray-900 bg-opacity-50 backdrop-blur-sm z-50 hidden items-center justify-center">
        <div class="bg-gradient-to-r from-green-400 to-blue-500 rounded-2xl shadow-2xl p-8 flex flex-col items-center space-y-4">
            <div class="relative w-20 h-20">
                <div class="absolute inset-0 border-4 border-green-200 border-t-green-600 rounded-full animate-spin"></div>
                <div class="absolute inset-2 border-4 border-blue-200 border-t-blue-600 rounded-full animate-spin" style="animation-direction: reverse; animation-duration: 0.8s;"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="text-3xl">🛸</div>
                </div>
            </div>
            <p class="text-white font-bold text-xl">Portal Loading...</p>
        </div>
    </div>
`;

document.body.insertAdjacentHTML('beforeend', loaderHTML);
const overlay = document.getElementById('ajax-loader');

window.showLoader = function() {
    if (overlay) {
        overlay.classList.remove('hidden');
        overlay.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }
};

window.hideLoader = function() {
    if (overlay) {
        overlay.classList.add('hidden');
        overlay.classList.remove('flex');
        document.body.style.overflow = '';
    }
};

// Show loader on link clicks
document.addEventListener('click', (e) => {
    const link = e.target.closest('a');
    if (link && link.href && !link.href.includes('#') && !link.target) {
        showLoader();
    }
});

// Show loader on form submissions
document.addEventListener('submit', (e) => {
    const form = e.target;
    if (form.tagName === 'FORM') {
        showLoader();
    }
});

// Hide loader immediately when page loads
hideLoader();

console.log('Loader initialized');