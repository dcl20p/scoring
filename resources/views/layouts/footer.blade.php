<!-- Footer with Links -->
<footer class="bg-white py-8 border-t">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="mb-4 md:mb-0">
                <p class="text-sm text-gray-500">
                    &copy; {{ date('Y') }} {{ config('app.name') }}. {{ __('landing.all_rights_reserved') }}.
                </p>
            </div>
            <div class="flex gap-6">
                <a href="{{ route('terms') }}" class="text-sm text-gray-500 hover:text-primary transition-colors">
                    {{ __('landing.terms') }}
                </a>
                <a href="{{ route('privacy') }}" class="text-sm text-gray-500 hover:text-primary transition-colors">
                    {{ __('landing.privacy') }}
                </a>
            </div>
        </div>
    </div>
</footer>