{{-- resources/views/components/ui/accordion.blade.php --}}
@props(['class' => ''])

<div x-data="{ open: false }" {{ $attributes->merge(['class' => "border-b {$class}"]) }}>
    <button @click="open = !open" class="flex w-full items-center justify-between py-4">
        {{ $trigger }}
        <svg :class="{'rotate-180': open}" class="h-5 w-5 transition-transform">
            <path d="M6 9l6 6 6-6" />
        </svg>
    </button>
    <div x-show="open" class="pb-4 pt-0">
        {{ $content }}
    </div>
</div>