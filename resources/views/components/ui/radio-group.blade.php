{{-- resources/views/components/ui/radio-group.blade.php --}}
@props(['class' => ''])

<div {{ $attributes->merge(['class' => "grid gap-2 {$class}"]) }}>
    {{ $slot }}
</div>