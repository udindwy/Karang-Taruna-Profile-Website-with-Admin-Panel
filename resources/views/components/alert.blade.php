@props(['type' => 'success', 'message'])

@php
    $class = '';
    switch ($type) {
        case 'success':
            $class = 'bg-green-100 border-green-400 text-green-700';
            break;
        case 'error':
            $class = 'bg-red-100 border-red-400 text-red-700';
            break;
        case 'warning':
            $class = 'bg-yellow-100 border-yellow-400 text-yellow-700';
            break;
    }
@endphp

@if (session($type))
    <div x-data="{ show: true }" x-show="show" x-transition.opacity.out.duration.1000ms
        class="fixed top-20 right-5 z-50 p-4 rounded-lg shadow-lg" :class="'{{ $class }}'">
        <div class="flex items-center">
            <div>
                <strong class="font-bold">{{ ucfirst($type) }}!</strong>
                <span class="block sm:inline">{{ session($type) }}</span>
            </div>
            <button @click="show = false"
                class="ml-auto -mx-1.5 -my-1.5 p-1.5 rounded-lg focus:ring-2 focus:ring-opacity-50">
                <span class="sr-only">Dismiss</span>
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </div>
@endif
