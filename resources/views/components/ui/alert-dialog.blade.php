{{-- resources/views/components/ui/alert-dialog.blade.php --}}
@props(['open' => false, 'class' => ''])

<div x-data="{ open: @js($open) }" class="relative z-50 {{ $class }}">
    <!-- Overlay -->
    <div x-show="open" class="fixed inset-0 bg-black/50"></div>
    
    <!-- Content -->
    <div x-show="open" class="fixed left-1/2 top-1/2 w-full max-w-lg -translate-x-1/2 -translate-y-1/2 rounded-lg bg-background p-6 shadow-lg">
        {{ $slot }}
    </div>
</div>