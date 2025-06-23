{{-- resources/views/components/ui/context-menu.blade.php --}}
@props(['class' => ''])

<div x-data="{ open: false }" 
     @contextmenu.prevent="open = true; $event.clientX > window.innerWidth - 200 ? x = $event.clientX - 200 : x = $event.clientX; y = $event.clientY"
     class="relative {{ $class }}">
    {{ $slot }}
    <div 
        x-show="open"
        @click.away="open = false"
        class="fixed z-50 w-56 rounded-md border bg-popover p-1 text-popover-foreground shadow-md"
        :style="`left: ${x}px; top: ${y}px`"
    >
        {{ $content }}
    </div>
</div>