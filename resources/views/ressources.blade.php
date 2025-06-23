@extends('home')

@section('content')
<div class="min-h-screen flex flex-col background-black">
    <!-- En-tête -->
    <section class="bg-gradient-to-r from-sgve-purple to-NoVi-darkPurple py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-darkPurple mb-6 ">
                Ressources pour la protection de l'enfance
            </h1>
            <p class="text-xl text-white/80 max-w-3xl mx-auto">
                Découvrez nos ressources pour mieux comprendre, prévenir et signaler les violences faites aux enfants.
            </p>
        </div>
    </section>
    
    <!-- Section des ressources -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div x-data="{ activeTab: 'documents' }">
            <div class="grid w-full grid-cols-2 md:grid-cols-4 mb-8 bg-gray-100 p-1 rounded-lg">
                <button 
                    @click="activeTab = 'documents'"
                    :class="{ 'bg-white shadow': activeTab === 'documents' }"
                    class="py-2 px-4 rounded-md flex items-center justify-center gap-2 transition-all"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text">
                        <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" x2="8" y1="13" y2="13"/>
                        <line x1="16" x2="8" y1="17" y2="17"/>
                        <line x1="10" x2="8" y1="9" y2="9"/>
                    </svg>
                    Documents
                </button>
                <button 
                    @click="activeTab = 'guides'"
                    :class="{ 'bg-white shadow': activeTab === 'guides' }"
                    class="py-2 px-4 rounded-md flex items-center justify-center gap-2 transition-all"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-open">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                    </svg>
                    Guides pratiques
                </button>
                <button 
                    @click="activeTab = 'videos'"
                    :class="{ 'bg-white shadow': activeTab === 'videos' }"
                    class="py-2 px-4 rounded-md flex items-center justify-center gap-2 transition-all"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-video">
                        <path d="m22 8-6 4 6 4V8Z"/>
                        <rect width="14" height="12" x="2" y="6" rx="2" ry="2"/>
                    </svg>
                    Vidéos
                </button>
                <button 
                    @click="activeTab = 'outils'"
                    :class="{ 'bg-white shadow': activeTab === 'outils' }"
                    class="py-2 px-4 rounded-md flex items-center justify-center gap-2 transition-all"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                        <polyline points="7 10 12 15 17 10"/>
                        <line x1="12" x2="12" y1="15" y2="3"/>
                    </svg>
                    Outils
                </button>
            </div>
            
            <!-- Onglet Documents -->
            <div x-show="activeTab === 'documents'" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach([
                        [
                            'title' => "Cadre juridique de la protection de l'enfance",
                            'description' => "Document présentant les lois et règlements encadrant la protection des enfants.",
                            'type' => "PDF",
                            'date' => "Janvier 2023"
                        ],
                        [
                            'title' => "Rapport annuel sur les violences faites aux enfants",
                            'description' => "Statistiques et analyses sur les cas signalés l'année dernière.",
                            'type' => "PDF",
                            'date' => "Mars 2023"
                        ],
                        [
                            'title' => "Les signes de maltraitance",
                            'description' => "Comment identifier les différents types de maltraitance chez l'enfant.",
                            'type' => "PDF",
                            'date' => "Juin 2023"
                        ],
                        [
                            'title' => "Procédures de signalement",
                            'description' => "Guide officiel des procédures à suivre pour effectuer un signalement.",
                            'type' => "PDF",
                            'date' => "Septembre 2023"
                        ],
                        [
                            'title' => "Étude sur l'impact psychologique",
                            'description' => "Conséquences psychologiques des violences sur le développement de l'enfant.",
                            'type' => "PDF",
                            'date' => "Novembre 2023"
                        ],
                        [
                            'title' => "Recommandations pour les professionnels",
                            'description' => "Bonnes pratiques pour les professionnels en contact avec des enfants.",
                            'type' => "PDF",
                            'date' => "Février 2024"
                        ]
                    ] as $doc)
                    <div class="bg-white rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                        <div class="p-6">
                            <h3 class="font-bold text-lg text-sgve-purple">{{ $doc['title'] }}</h3>
                            <p class="text-gray-600 mt-2">{{ $doc['description'] }}</p>
                        </div>
                        <div class="px-6 py-4 border-t border-gray-100 flex justify-between items-center">
                            <div class="text-sm text-gray-500">
                                {{ $doc['type'] }} • {{ $doc['date'] }}
                            </div>
                            <button class="inline-flex items-center px-3 py-1 border border-gray-300 rounded-md text-sm font-medium hover:bg-gray-50 gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                    <polyline points="7 10 12 15 17 10"/>
                                    <line x1="12" x2="12" y1="15" y2="3"/>
                                </svg>
                                Télécharger
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Onglet Guides -->
            <div x-show="activeTab === 'guides'" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach([
                        [
                            'title' => "Guide pour les parents",
                            'description' => "Comment parler de la sécurité aux enfants et reconnaître les signes d'alerte."
                        ],
                        [
                            'title' => "Guide pour les enseignants",
                            'description' => "Protocole à suivre en milieu scolaire face à un cas suspecté."
                        ],
                        [
                            'title' => "Guide pour les professionnels de santé",
                            'description' => "Procédure d'examen et de signalement en milieu médical."
                        ],
                        [
                            'title' => "Guide pour les travailleurs sociaux",
                            'description' => "Accompagnement des familles et interventions appropriées."
                        ]
                    ] as $guide)
                    <div class="bg-white rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                        <div class="p-6">
                            <div class="mb-4 inline-block p-3 rounded-full bg-sgve-purple/10">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                                    <circle cx="9" cy="7" r="4"/>
                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                                </svg>
                            </div>
                            <h3 class="font-bold text-lg">{{ $guide['title'] }}</h3>
                            <p class="text-gray-600 mt-2">{{ $guide['description'] }}</p>
                        </div>
                        <div class="px-6 py-4 border-t border-gray-100">
                            <button class="w-full inline-flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md text-sm font-medium hover:bg-gray-50 gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-open">
                                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                                </svg>
                                Consulter le guide
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Onglet Vidéos -->
            <div x-show="activeTab === 'videos'" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach([
                        [
                            'title' => "Reconnaître les signes de maltraitance",
                            'description' => "Formation vidéo sur l'identification des signes de violence.",
                            'duration' => "12:34"
                        ],
                        [
                            'title' => "Comment signaler efficacement",
                            'description' => "Guide pratique pour faire un signalement complet.",
                            'duration' => "08:21"
                        ],
                        [
                            'title' => "L'accompagnement des victimes",
                            'description' => "Approches pour soutenir les enfants victimes de violence.",
                            'duration' => "15:47"
                        ],
                        [
                            'title' => "Prévention en milieu scolaire",
                            'description' => "Actions de sensibilisation à mener auprès des élèves.",
                            'duration' => "10:05"
                        ]
                    ] as $video)
                    <div class="bg-gray-100 rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <div class="relative aspect-video bg-black">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="bg-sgve-purple/90 rounded-full p-4 text-white cursor-pointer hover:bg-sgve-purple transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                        <path fill-rule="evenodd" d="M4.5 5.653c0-1.426 1.529-2.33 2.779-1.643l11.54 6.348c1.295.712 1.295 2.573 0 3.285L7.28 19.991c-1.25.687-2.779-.217-2.779-1.643V5.653z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-lg text-sgve-purple">{{ $video['title'] }}</h3>
                            <p class="text-gray-600 mt-2">{{ $video['description'] }}</p>
                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-sm text-gray-500 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                    </svg>
                                    {{ $video['duration'] }}
                                </span>
                                <button class="text-sm text-sgve-purple hover:text-sgve-darkPurple flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-external-link mr-1">
                                        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                                        <polyline points="15 3 21 3 21 9"/>
                                        <line x1="10" x2="21" y1="14" y2="3"/>
                                    </svg>
                                    Voir
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Onglet Outils -->
            <div x-show="activeTab === 'outils'" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach([
                        [
                            'title' => "Formulaire d'évaluation des risques",
                            'description' => "Outil pour évaluer le niveau de risque d'un enfant en situation potentiellement dangereuse.",
                            'format' => "Excel"
                        ],
                        [
                            'title' => "Checklist d'observation",
                            'description' => "Liste des signes physiques et comportementaux à observer chez l'enfant.",
                            'format' => "PDF"
                        ],
                        [
                            'title' => "Application mobile de signalement",
                            'description' => "Application pour effectuer des signalements rapides depuis votre smartphone.",
                            'format' => "Application"
                        ],
                        [
                            'title' => "Kit de communication",
                            'description' => "Affiches et dépliants de sensibilisation pour les écoles et structures d'accueil.",
                            'format' => "ZIP"
                        ],
                        [
                            'title' => "Modèle de rapport de signalement",
                            'description' => "Document type pour préparer un signalement détaillé et complet.",
                            'format' => "Word"
                        ],
                        [
                            'title' => "Fiches pratiques par type de violence",
                            'description' => "Ensemble de fiches détaillant chaque type de violence et la procédure spécifique.",
                            'format' => "PDF"
                        ]
                    ] as $outil)
                    <div class="bg-white rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                        <div class="p-6">
                            <h3 class="font-bold text-lg">{{ $outil['title'] }}</h3>
                            <p class="text-gray-600 mt-2">{{ $outil['description'] }}</p>
                        </div>
                        <div class="px-6 py-4 border-t border-gray-100 flex justify-between items-center">
                            <span class="px-2 py-1 bg-sgve-purple/10 text-sgve-purple text-xs rounded">
                                {{ $outil['format'] }}
                            </span>
                            <button class="inline-flex items-center px-3 py-1 bg-sgve-purple text-white rounded-md text-sm font-medium hover:bg-sgve-darkPurple">
                                Télécharger
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    
    <!-- Section d'aide supplémentaire -->
    <section class="bg-sgve-yellow/10 py-12 px-4">
        <div class="max-w-5xl mx-auto text-center">
            <h2 class="text-2xl md:text-3xl font-bold text-sgve-gray mb-6">
                Besoin d'aide supplémentaire ?
            </h2>
            <p class="text-sgve-gray/80 mb-8 max-w-3xl mx-auto">
                Notre équipe est disponible pour vous fournir des ressources personnalisées ou répondre à vos questions spécifiques concernant la protection des enfants.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <button class="bg-sgve-purple hover:bg-sgve-darkPurple text-white px-4 py-2 rounded-md">
                    Contacter un spécialiste
                </button>
                <button class="border border-sgve-purple text-sgve-purple hover:bg-sgve-purple hover:text-white px-4 py-2 rounded-md">
                    Demander une documentation
                </button>
            </div>
        </div>
    </section>
</div>
@endsection