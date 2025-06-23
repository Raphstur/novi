{{-- resources/views/components/ui/command.blade.php --}}
@props(['class' => ''])

<div x-data="{ open: false }" class="relative {{ $class }}">
    <input 
        @keydown.escape="open = false"
        @keydown.enter="open = true"
        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
        placeholder="Type a command or search..."
    >
    <div x-show="open" class="absolute z-50 mt-1 w-full rounded-md border bg-popover shadow-lg">
        {{ $slot }}
    </div>
</div>