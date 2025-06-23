{{-- resources/views/components/ui/progress.blade.php --}}
@props(['value' => 0, 'class' => ''])

<div class="relative h-4 w-full overflow-hidden rounded-full bg-secondary">
    <div 
        class="h-full w-full flex-1 bg-primary transition-all" 
        style="width: {{ $value }}%"
    ></div>
</div>