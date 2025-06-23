{{-- resources/views/components/ui/slider.blade.php --}}
@props(['class' => '', 'min' => 0, 'max' => 100, 'step' => 1])

<input type="range" {{ $attributes->merge([
    'class' => "relative flex w-full touch-none select-none items-center {$class}",
    'min' => $min,
    'max' => $max,
    'step' => $step
]) }}>