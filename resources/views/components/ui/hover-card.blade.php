{{-- resources/views/components/ui/hover-card.blade.php --}}
@props(['class' => ''])

<div x-data="{ open: false }" class="relative inline-block {{ $class }}">
    <div @mouseenter="open = true" @mouseleave="open = false">
        {{ $trigger }}
    </div>
    <div x-show="open" class="absolute z-50 w-64 rounded-md border bg-popover p-4 shadow-md">
        {{ $content }}
    </div>
</div>