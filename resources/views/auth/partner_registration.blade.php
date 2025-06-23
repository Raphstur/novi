<!-- resources/views/auth/partner_registration.blade.php -->
@extends('home')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Inscription Partenaire
            </h2>
        </div>

        @if(session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('status') }}
            </div>
        @endif

        @if($errors->any()))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="mt-8 space-y-6" method="POST" action="{{ route('partner.register') }}">
            @csrf
            
            <div class="rounded-md shadow-sm space-y-4">
                <!-- Informations de connexion (Utilisateur) -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email*</label>
                    <input id="email" name="email" type="email" required
                           class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-purple-500 focus:border-purple-500 focus:z-10 sm:text-sm"
                           value="{{ old('email') }}">
                </div>

                <div>
                    <label for="mot_de_passe_chiffre" class="block text-sm font-medium text-gray-700">Mot de passe*</label>
                    <input id="mot_de_passe_chiffre" name="mot_de_passe_chiffre" type="password" required
                           class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-purple-500 focus:border-purple-500 focus:z-10 sm:text-sm">
                    @error('mot_de_passe_chiffre')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="mot_de_passe_chiffre_confirmation" class="block text-sm font-medium text-gray-700">Confirmer mot de passe*</label>
                    <input id="mot_de_passe_chiffre_confirmation" name="mot_de_passe_chiffre_confirmation" type="password" required
                           class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-purple-500 focus:border-purple-500 focus:z-10 sm:text-sm">
                </div>

                <!-- Informations organisation (Partenaires) -->
                <div class="border-t border-gray-200 pt-4 mt-4">
                    <h3 class="text-lg font-medium text-gray-900">Informations de l'organisation</h3>
                </div>

                <div>
                    <label for="nom" class="block text-sm font-medium text-gray-700">Nom du responsable*</label>
                    <input id="nom" name="nom" type="text" required
                           class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-purple-500 focus:border-purple-500 focus:z-10 sm:text-sm"
                           value="{{ old('nom') }}">
                </div>

                <div>
                    <label for="nom_organisation" class="block text-sm font-medium text-gray-700">Nom organisation*</label>
                    <input id="nom_organisation" name="nom_organisation" type="text" required
                           class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-purple-500 focus:border-purple-500 focus:z-10 sm:text-sm"
                           value="{{ old('nom_organisation') }}">
                </div>

                <div>
                    <label for="specialite" class="block text-sm font-medium text-gray-700">Spécialité*</label>
                    <input id="specialite" name="specialite" type="text" required
                           class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-purple-500 focus:border-purple-500 focus:z-10 sm:text-sm"
                           value="{{ old('specialite') }}">
                </div>

                <div>
                    <label for="zone_couverte" class="block text-sm font-medium text-gray-700">Zone couverte*</label>
                    <input id="zone_couverte" name="zone_couverte" type="text" required
                           class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-purple-500 focus:border-purple-500 focus:z-10 sm:text-sm"
                           value="{{ old('zone_couverte') }}">
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                    S'inscrire
                </button>
            </div>
        </form>

        <div class="text-center">
            <p class="text-sm text-gray-600">
                Déjà inscrit? 
                <a href="{{ route('login') }}" class="font-medium text-purple-600 hover:text-purple-500">
                    Se connecter
                </a>
            </p>
        </div>
    </div>
</div>
@endsection