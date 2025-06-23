{{-- resources/views/components/ui/button.blade.php --}}
@props(['variant' => 'default', 'size' => 'default', 'class' => ''])

@php
    $base = "inline-flex items-center justify-center rounded-md font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring disabled:opacity-50 disabled:pointer-events-none";
    
    $variants = [
        'default' => 'bg-primary text-primary-foreground hover:bg-primary/90',
        'destructive' => 'bg-destructive text-destructive-foreground hover:bg-destructive/90',
        'outline' => 'border border-input hover:bg-accent hover:text-accent-foreground',
        'ghost' => 'hover:bg-accent hover:text-accent-foreground',
    ];
    
    $sizes = [
        'default' => 'h-10 px-4 py-2',
        'sm' => 'h-9 rounded-md px-3',
        'lg' => 'h-11 rounded-md px-8',
    ];
@endphp

<button {{ $attributes->merge(['class' => "$base {$variants[$variant]} {$sizes[$size]} {$class}"]) }}>
    {{ $slot }}
</button>