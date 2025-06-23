{{-- resources/views/components/ui/toggle.blade.php --}}
@props(['pressed' => false, 'class' => ''])

<button {{ $attributes->merge(['class' => "inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring disabled:opacity-50 disabled:pointer-events-none data-[state=on]:bg-accent data-[state=on]:text-accent-foreground {$class}"]) }}>
    {{ $slot }}
</button>