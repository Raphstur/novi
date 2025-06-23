@extends('home') {{-- Ou votre layout principal si différent --}}

@section('content')
<div class="min-h-screen flex flex-col">
    @include('navbar')
    
    @include('hero')
    
    @include('feature-cards')
    
    @include('stats-section')
    
    @include('call-to-action')
    
    @include('footer')
    
    @include('assistant-button')
</div>
@endsection