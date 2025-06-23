@extends('home')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50">
    <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-md text-center">
        <div class="text-green-500 text-5xl mb-4">
            <i class="fas fa-check-circle"></i>
        </div>
        <h2 class="text-2xl font-bold mb-2">Signalement enregistré</h2>
        <p class="mb-6">Votre signalement a bien été pris en compte.</p>
        
        @if(session('code_suivi'))
        <div class="bg-gray-100 p-4 rounded-md mb-6">
            <p class="font-semibold">Votre code de suivi:</p>
            <p class="text-xl font-mono bg-white p-2 rounded mt-2">{{ session('code_suivi') }}</p>
            <p class="text-sm mt-2">Conservez précieusement ce code pour suivre l'avancement de votre signalement.</p>
        </div>
        @endif

        <a href="{{ route('home') }}" class="inline-block bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-md">
            Retour à l'accueil
        </a>
    </div>
</div>
@endsection