{{-- resources/views/components/ui/input.blade.php --}}
@props(['class' => '', 'type' => 'text'])

<input type="{{ $type }}" {{ $attributes->merge(['class' => "flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium {$class}"]) }}>