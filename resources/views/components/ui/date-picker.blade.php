{{-- resources/views/components/ui/date-picker.blade.php --}}
@props(['class' => ''])

<div x-data="{ open: false, date: new Date() }" class="relative {{ $class }}">
    <input 
        type="text" 
        x-model="date.toLocaleDateString()" 
        @click="open = !open"
        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
    >
    <div x-show="open" class="absolute z-50 mt-1 w-auto rounded-md border bg-popover p-3 shadow-lg">
        <!-- Calendar implementation would go here -->
        {{ $slot }}
    </div>
</div>