@extends('home')

@section('content')
@php
if (!function_exists('formatBytes')) {
    function formatBytes($bytes, $decimals = 2) {
        if ($bytes == 0) return '0 Bytes';
        $k = 1024;
        $sizes = ['Bytes', 'KB', 'MB', 'GB'];
        $i = floor(log($bytes) / log($k));
        return round($bytes / pow($k, $i), $decimals) . ' ' . $sizes[$i];
    }
}
@endphp

<!-- Styles CSS personnalisés -->
<style>
    .card-hover {
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    .info-badge {
        font-size: 0.85rem;
        padding: 0.35rem 0.75rem;
    }
    .section-header {
        position: relative;
        padding-left: 1.5rem;
    }
    .section-header::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 4px;
        background: linear-gradient(to bottom, #4f46e5, #7c3aed);
        border-radius: 2px;
    }
    .preuve-card {
        transition: all 0.3s ease;
        overflow: hidden;
    }
    .preuve-card:hover {
        transform: scale(1.02);
    }
    .preuve-image {
        height: 180px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .preuve-card:hover .preuve-image {
        transform: scale(1.05);
    }
    .timeline-item {
        position: relative;
        padding-left: 2rem;
        margin-bottom: 1.5rem;
    }
    .timeline-item::before {
        content: '';
        position: absolute;
        left: 0.5rem;
        top: 0;
        height: 100%;
        width: 2px;
        background-color: #e2e8f0;
    }
    .timeline-badge {
        position: absolute;
        left: 0;
        top: 0;
        width: 1rem;
        height: 1rem;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1;
    }
    .animate-fade-in {
        animation: fadeIn 0.6s ease-in-out;
    }
    .animate-slide-up {
        animation: slideUp 0.5s ease-out;
    }
    .animate-delay-1 {
        animation-delay: 0.1s;
    }
    .animate-delay-2 {
        animation-delay: 0.2s;
    }
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    @keyframes slideUp {
        from { 
            opacity: 0;
            transform: translateY(20px);
        }
        to { 
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<!-- Intégration des bibliothèques d'animation -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>

<div class="container py-8 mx-auto" style="background: #f8fafc; min-height: 100vh;">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Barre de recherche animée -->
        <div class="flex justify-end mb-8 animate__animated animate__fadeInDown">
            <div class="w-full md:w-96">
                <form action="{{ route('suivi') }}" method="GET" class="relative">
                    <input 
                        type="text" 
                        name="code" 
                        class="w-full pl-5 pr-12 py-3 rounded-full border-0 shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none transition-all duration-300"
                        placeholder="Entrez votre code de suivi (ex: SIG-ABCD1234)"
                        value="{{ request('code', $signalement->code_suivi ?? '') }}"
                        required
                    >
                    <button 
                        type="submit" 
                        class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-indigo-600 text-white p-2 rounded-full hover:bg-indigo-700 transition-colors duration-300"
                    >
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>

        @if(isset($signalement))
            <!-- Carte principale du signalement -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8 animate__animated animate__fadeIn">
                <!-- En-tête avec effet de gradient -->
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 px-6 py-4 flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-white">
                            Signalement #{{ $signalement->numero_dossier }}
                        </h2>
                        <p class="text-blue-100 text-sm mt-1">
                            Code de suivi: {{ $signalement->code_suivi }}
                        </p>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-semibold text-white 
                        {{ $signalement->statut == 'brouillon' ? 'bg-blue-500' : '' }}
                        {{ $signalement->statut == 'traité' ? 'bg-yellow-500' : '' }}
                        {{ $signalement->statut == 'clos' ? 'bg-green-500' : '' }}">
                        {{ strtoupper($signalement->statut) }}
                    </span>
                </div>

                <!-- Contenu principal -->
                <div class="p-6">
                    <!-- Grille responsive -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Section Détails du signalement -->
                        <div class="bg-gray-50 rounded-lg p-5 card-hover animate__animated animate__fadeIn animate-delay-1">
                            <div class="section-header mb-4">
                                <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                                    <i class="fas fa-info-circle text-indigo-600 mr-2"></i>
                                    Détails du signalement
                                </h3>
                            </div>
                            <div class="space-y-3">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Description</p>
                                    <p class="mt-1 text-gray-700">{{ $signalement->description }}</p>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Niveau d'urgence</p>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium mt-1
                                            {{ $signalement->niveau_urgence == 'urgent' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ $signalement->niveau_urgence }}
                                        </span>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Date</p>
                                        <p class="mt-1 text-gray-700">{{ \Carbon\Carbon::parse($signalement->date_creation)->format('d/m/Y à H:i') }}</p>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Type de violence</p>
                                    <p class="mt-1 text-gray-700">
                                        {{ $signalement->typeViolence->nom }}
                                        @if($signalement->typeViolence->sous_categorie)
                                            <span class="text-gray-500">({{ $signalement->typeViolence->sous_categorie }})</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Section Localisation -->
                        <div class="bg-gray-50 rounded-lg p-5 card-hover animate__animated animate__fadeIn animate-delay-1">
                            <div class="section-header mb-4">
                                <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                                    <i class="fas fa-map-marker-alt text-indigo-600 mr-2"></i>
                                    Localisation
                                </h3>
                            </div>
                            <div class="space-y-3">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Adresse</p>
                                    <p class="mt-1 text-gray-700">
                                        @if($signalement->localisation)
                                            {{ $signalement->localisation->adresse }}
                                        @else
                                            <span class="text-gray-400">Non renseignée</span>
                                        @endif
                                    </p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Zone administrative</p>
                                    <p class="mt-1 text-gray-700">
                                        @if($signalement->localisation)
                                            {{ $signalement->localisation->zone_administrative }}
                                        @else
                                            <span class="text-gray-400">Non renseignée</span>
                                        @endif
                                    </p>
                                </div>
                                @if($signalement->localisation && $signalement->localisation->latitude && $signalement->localisation->longitude)
                                    <div id="map" class="h-48 rounded-lg overflow-hidden shadow-inner mt-3"></div>
                                @else
                                    <div class="h-48 bg-gray-100 rounded-lg flex flex-col items-center justify-center mt-3">
                                        <i class="fas fa-map-marked-alt text-gray-300 text-4xl mb-2"></i>
                                        <p class="text-gray-400">Localisation non disponible</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Section Témoin -->
                        <div class="bg-gray-50 rounded-lg p-5 card-hover animate__animated animate__fadeIn animate-delay-2">
                            <div class="section-header mb-4">
                                <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                                    <i class="fas fa-user-tie text-indigo-600 mr-2"></i>
                                    Informations du témoin
                                </h3>
                            </div>
                            @if($signalement->victime && $signalement->victime->temoin)
                                <div class="space-y-3">
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Nom complet</p>
                                        <p class="mt-1 text-gray-700">{{ $signalement->victime->temoin->nom_complet }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Contact</p>
                                        <p class="mt-1 text-gray-700">{{ $signalement->victime->temoin->contact }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Relation avec la victime</p>
                                        <p class="mt-1 text-gray-700">{{ $signalement->victime->temoin->relation_victime }}</p>
                                    </div>
                                </div>
                            @else
                                <p class="text-gray-400 italic">Aucune information sur le témoin</p>
                            @endif
                        </div>

                        <!-- Section Victime -->
                        <div class="bg-gray-50 rounded-lg p-5 card-hover animate__animated animate__fadeIn animate-delay-2">
                            <div class="section-header mb-4">
                                <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                                    <i class="fas fa-child text-indigo-600 mr-2"></i>
                                    Informations sur la victime
                                </h3>
                            </div>
                            @if($signalement->victime)
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Âge</p>
                                        <p class="mt-1 text-gray-700">{{ $signalement->victime->age }} ans</p>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Genre</p>
                                        <p class="mt-1 text-gray-700">{{ $signalement->victime->genre }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Anonyme</p>
                                        <p class="mt-1 text-gray-700">{{ $signalement->victime->anonyme ? 'Oui' : 'Non' }}</p>
                                    </div>
                                    @if(!$signalement->victime->anonyme && $signalement->victime->telephone)
                                        <div>
                                            <p class="text-sm font-medium text-gray-500">Téléphone</p>
                                            <p class="mt-1 text-gray-700">{{ $signalement->victime->telephone }}</p>
                                        </div>
                                    @endif
                                </div>
                            @else
                                <p class="text-gray-400 italic">Aucune information sur la victime</p>
                            @endif
                        </div>
                    </div>

                    <!-- Section Preuves -->
                    @if($signalement->preuves->count() > 0)
                        <div class="mt-8 bg-gray-50 rounded-lg p-5 card-hover animate__animated animate__fadeIn">
                            <div class="section-header mb-4">
                                <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                                    <i class="fas fa-paperclip text-indigo-600 mr-2"></i>
                                    Preuves jointes
                                </h3>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach($signalement->preuves as $preuve)
                                    <div class="preuve-card bg-white rounded-lg overflow-hidden shadow-sm border border-gray-100">
                                        @if(in_array($preuve->type, ['photo', 'vidéo']))
                                            <img src="{{ Storage::url($preuve->chemin_fichier) }}" 
                                                 class="preuve-image w-full" 
                                                 alt="Preuve {{ $loop->iteration }}">
                                        @else
                                            <div class="p-4 text-center">
                                                <div class="bg-indigo-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-3">
                                                    <i class="fas fa-file-alt text-indigo-600 text-2xl"></i>
                                                </div>
                                                <p class="text-gray-700 font-medium">Document joint</p>
                                            </div>
                                        @endif
                                        <div class="px-4 py-2 bg-gray-50 border-t border-gray-100">
                                            <div class="flex justify-between items-center">
                                                <span class="text-xs font-medium text-gray-500">
                                                    {{ strtoupper(pathinfo($preuve->chemin_fichier, PATHINFO_EXTENSION)) }}
                                                </span>
                                                <span class="text-xs text-gray-500">
                                                    {{ formatBytes($preuve->taille_fichier) }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Section Historique du suivi -->
                    @if($signalement->suivis->count() > 0)
                        <div class="mt-8 bg-gray-50 rounded-lg p-5 card-hover animate__animated animate__fadeIn">
                            <div class="section-header mb-4">
                                <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                                    <i class="fas fa-history text-indigo-600 mr-2"></i>
                                    Historique du suivi
                                </h3>
                            </div>
                            <div class="space-y-4">
                                @foreach($signalement->suivis->sortByDesc('date_suivi') as $suivi)
                                    <div class="timeline-item pl-6">
                                        <div class="timeline-badge 
                                            {{ $suivi->statut == 'brouillon' ? 'bg-blue-500' : '' }}
                                            {{ $suivi->statut == 'traité' ? 'bg-yellow-500' : '' }}
                                            {{ $suivi->statut == 'clos' ? 'bg-green-500' : '' }}">
                                            <i class="fas 
                                                {{ $suivi->statut == 'brouillon' ? 'fa-pencil-alt' : '' }}
                                                {{ $suivi->statut == 'traité' ? 'fa-check-circle' : '' }}
                                                {{ $suivi->statut == 'clos' ? 'fa-lock' : '' }} 
                                                text-white text-xs">
                                            </i>
                                        </div>
                                        <div class="bg-white p-4 rounded-lg shadow-sm">
                                            <div class="flex justify-between items-start">
                                                <h4 class="font-medium text-gray-800">
                                                    {{ ucfirst($suivi->statut) }}
                                                </h4>
                                                <span class="text-xs text-gray-500">
                                                    {{ \Carbon\Carbon::parse($suivi->date_suivi)->format('d/m/Y à H:i') }}
                                                </span>
                                            </div>
                                            @if($suivi->commentaire)
                                                <p class="mt-2 text-gray-600 text-sm">
                                                    {{ $suivi->commentaire }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @elseif(request()->has('code'))
            <!-- Message d'erreur si code invalide -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden animate__animated animate__fadeIn">
                <div class="p-6 text-center">
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                        <i class="fas fa-exclamation-triangle text-red-600"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">
                        Signalement introuvable
                    </h3>
                    <p class="text-gray-500">
                        Aucun signalement trouvé avec le code "{{ request('code') }}".
                    </p>
                    <p class="text-gray-500 mt-1">
                        Veuillez vérifier le code et réessayer.
                    </p>
                </div>
            </div>
        @endif
    </div>
</div>

@if(isset($signalement) && $signalement->localisation && $signalement->localisation->latitude && $signalement->localisation->longitude)
<!-- Intégration de Leaflet pour la carte -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const map = L.map('map').setView([
        {{ $signalement->localisation->latitude }}, 
        {{ $signalement->localisation->longitude }}
    ], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    const marker = L.marker([
        {{ $signalement->localisation->latitude }}, 
        {{ $signalement->localisation->longitude }}
    ]).addTo(map);
    
    marker.bindPopup(`
        <div class="font-medium text-gray-800">Lieu du signalement</div>
        <div class="text-sm text-gray-600 mt-1">
            ${map.getCenter().lat.toFixed(6)}, ${map.getCenter().lng.toFixed(6)}
        </div>
    `).openPopup();
    
    // Animation du marqueur
    setTimeout(() => {
        marker.setOpacity(0);
        marker.setOpacity(1);
    }, 500);
});
</script>
@endif

<!-- Animation au scroll -->
<script src="https://unpkg.com/intersection-observer@0.12.0/intersection-observer.js"></script>
<script src="https://unpkg.com/scrollama@3.2.0/build/scrollama.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation des éléments au défilement
    const animateOnScroll = () => {
        const elements = document.querySelectorAll('.card-hover, .preuve-card');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        elements.forEach(element => {
            observer.observe(element);
        });
    };

    animateOnScroll();
});
</script>
@endsection