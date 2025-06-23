{{-- resources/views/components/ui/badge.blade.php --}}
@props(['variant' => 'default', 'class' => ''])

@php
    $variants = [
        'default' => 'bg-primary text-primary-foreground',
        'secondary' => 'bg-secondary text-secondary-foreground',
        'destructive' => 'bg-destructive text-destructive-foreground',
    ];
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {$variants[$variant]} {$class}"]) }}>
    {{ $slot }}
</span>