{{-- resources/views/components/ui/avatar.blade.php --}}
@props(['src' => '', 'alt' => '', 'class' => ''])

<div class="relative h-10 w-10 overflow-hidden rounded-full">
    <img src="{{ $src }}" alt="{{ $alt }}" {{ $attributes->merge(['class' => "h-full w-full object-cover {$class}"]) }}>
</div>