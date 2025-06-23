{{-- resources/views/components/ui/modal.blade.php --}}
@props(['show' => false, 'class' => ''])

<div 
    x-data="{ show: @js($show) }" 
    x-show="show"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 {{ $class }}"
>
    <div 
        @click.away="show = false"
        class="bg-background rounded-lg shadow-lg p-6 w-full max-w-md"
    >
        {{ $slot }}
    </div>
</div>