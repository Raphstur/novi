{{-- resources/views/components/ui/dropdown.blade.php --}}
@props(['align' => 'left', 'class' => ''])

<div x-data="{ open: false }" class="relative inline-block text-left {{ $class }}">
    <div @click="open = !open">
        {{ $trigger }}
    </div>

    <div 
        x-show="open"
        @click.away="open = false"
        class="absolute z-50 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5"
        :class="{ 'right-0': align === 'right', 'left-0': align === 'left' }"
    >
        {{ $content }}
    </div>
</div>