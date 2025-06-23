{{-- resources/views/components/ui/checkbox.blade.php --}}
@props(['class' => '', 'id' => uniqid()])

<div class="flex items-center space-x-2">
    <input type="checkbox" id="{{ $id }}" {{ $attributes->merge(['class' => "h-4 w-4 rounded border-input ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 {$class}"]) }}>
    <label for="{{ $id }}" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">
        {{ $slot }}
    </label>
</div>