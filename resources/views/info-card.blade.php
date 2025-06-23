<div class="bg-white rounded-lg shadow p-4 flex items-start">
    <div class="mr-4 p-2 bg-purple-100 rounded-full">
        @if($icon === 'phone')
            <x-icon.phone-call class="h-6 w-6 text-purple-600" />
        @elseif($icon === 'mail')
            <x-icon.mail class="h-6 w-6 text-purple-600" />
        @endif
    </div>
    <div>
        <h3 class="font-medium text-gray-800">{{ $title }}</h3>
        <p class="text-gray-600">{{ $content }}</p>
        @isset($note)
            <p class="text-sm text-gray-500 mt-1">{{ $note }}</p>
        @endisset
    </div>
</div>