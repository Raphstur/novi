{{-- resources/views/components/ui/alert.blade.php --}}
@props(['variant' => 'default', 'class' => ''])

@php
    $variants = [
        'default' => 'bg-background text-foreground',
        'destructive' => 'bg-destructive text-destructive-foreground',
    ];
@endphp

<div {{ $attributes->merge(['class' => "relative w-full rounded-lg border p-4 {$variants[$variant]} {$class}"]) }}>
    {{ $slot }}
</div>