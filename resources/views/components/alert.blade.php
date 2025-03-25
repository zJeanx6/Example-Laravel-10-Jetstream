@props(['title' => 'Sin titulo', 'type' => 'classic'])

@php
    switch ($type) {
        case 'classic':
            $clases = 'text-blue-800 bg-blue-50 dark:bg-gray-800 dark:text-blue-400';
            break;

        case 'danger':
            $clases = 'text-red-800 bg-red-50 dark:bg-gray-800 dark:text-red-400';
            break;

        default:
            $clases = 'text-blue-800 bg-blue-50 dark:bg-gray-800 dark:text-blue-400';
            break;
    }
@endphp

@dump($attributes)
{{-- class="p-4 mb-4 text-sm  rounded-lg {{$clases}}" --}}
<div {{ $attributes->merge(['class' => "p-4 mb-4 text-sm rounded-lg $clases", 'role' => "alert"]) }} >
    <h1 class="text-blue-800">{{ $title }}</h1>
    <span class="font-medium">{{ $slot }}</span>
</div>
