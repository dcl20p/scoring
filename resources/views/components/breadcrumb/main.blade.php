@props(['items' => []])

<nav aria-label="Breadcrumb">
    <ol class="inline-flex items-center">
        @foreach ($items as $item)
            <li class="flex items-center">
                @if (!$loop->last)
                    <a href="{{ $item['url'] }}" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 hover:font-semibold">
                        {{ $item['label'] }}
                    </a>
                    <svg class="stroke-current mx-2" width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.0765 12.667L10.2432 8.50033L6.0765 4.33366" stroke="" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                @else
                    <span class="text-gray-800 font-semibold dark:text-gray-400">
                        {{ $item['label'] }}
                    </span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>