@props(['rating' => 0, 'maxStars' => 5])

<div class="flex items-center">
    @php
        $rating = floatval($rating); // Convert to float for decimal ratings
        $fullStars = floor($rating); // Get whole number of stars
        $hasHalfStar = $rating - $fullStars > 0; // Check for partial star
    @endphp

    {{-- Full stars --}}
    @for ($i = 1; $i <= $fullStars; $i++)
        <x-icons.star filled="true" />
    @endfor

    {{-- Half star if applicable --}}
    @if ($hasHalfStar)
        <x-icons.star half="true" />
        @php $fullStars++; @endphp
    @endif

    {{-- Empty stars --}}
    @for ($i = $fullStars + 1; $i <= $maxStars; $i++)
        <x-icons.star />
    @endfor

    {{-- Optional: Show numeric rating --}}
    <span class="ml-1 text-sm text-gray-500">({{ number_format($rating, 1) }})</span>
</div>