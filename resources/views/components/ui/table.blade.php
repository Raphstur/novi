{{-- resources/views/components/ui/table.blade.php --}}
<div class="rounded-md border">
    <table class="w-full">
        <thead class="bg-muted/50">
            <tr>
                @foreach($headers as $header)
                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground">
                        {{ $header }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>