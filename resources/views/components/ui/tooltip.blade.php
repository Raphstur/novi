{{-- resources/views/components/ui/tooltip.blade.php --}}
@props(['content', 'class' => ''])

<div x-data="{ show: false }" class="relative inline-block {{ $class }}">
    <span @mouseenter="show = true" @mouseleave="show = false">
        {{ $slot }}
    </span>
    
    <div 
        x-show="show"
        class="absolute z-50 px-3 py-2 text-sm text-popover-foreground bg-popover rounded-md shadow-md"
    >
        {{ $content }}
    </div>
</div>