<?php

namespace App\View\Components\Icon;

use Illuminate\View\Component;

class SendHorizontal extends Component
{
    public function render()
    {
        return <<<'blade'
<svg {{ $attributes->merge(['class' => 'h-5 w-5']) }} 
     viewBox="0 0 24 24" 
     fill="none" 
     stroke="currentColor" 
     stroke-width="2" 
     stroke-linecap="round" 
     stroke-linejoin="round">
    <path d="m3 3 3 9-3 9 19-9Z" />
    <path d="M6 12h16" />
</svg>
blade;
    }
}