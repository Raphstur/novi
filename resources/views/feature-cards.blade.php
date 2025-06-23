<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold tracking-tight text-gray-800 sm:text-4xl">
                <span class="bg-gradient-to-r from-purple-600 to-yellow-400 bg-clip-text text-transparent">
                    Fonctionnalités
                </span>
            </h2>
            <p class="mt-4 text-lg text-gray-500">
                Notre système offre tous les outils nécessaires pour une gestion efficace des cas de violence.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $features = [
                    [
                        'title' => 'Signalement Facile',
                        'description' => 'Effectuez des signalements rapidement et en toute sécurité avec notre interface intuitive.',
                        'icon' => 'file-alt',
                        'color' => 'text-purple-600',
                        'bg' => 'bg-purple-100'
                    ],
                    [
                        'title' => 'Suivi en Temps Réel',
                        'description' => 'Suivez l\'évolution des cas signalés et les interventions mises en place.',
                        'icon' => 'clock',
                        'color' => 'text-yellow-400',
                        'bg' => 'bg-yellow-100'
                    ],
                    [
                        'title' => 'Coordination des Partenaires',
                        'description' => 'Facilitez la communication entre les différents acteurs impliqués dans la protection des enfants.',
                        'icon' => 'users',
                        'color' => 'text-purple-600',
                        'bg' => 'bg-purple-100'
                    ],
                    [
                        'title' => 'Signalement Anonyme',
                        'description' => 'Option de signalement anonyme pour garantir la sécurité des témoins.',
                        'icon' => 'shield-alt',
                        'color' => 'text-yellow-400',
                        'bg' => 'bg-yellow-100'
                    ],
                    [
                        'title' => 'Gestion des Interventions',
                        'description' => 'Organisation et coordination des interventions auprès des victimes.',
                        'icon' => 'gavel',
                        'color' => 'text-purple-600',
                        'bg' => 'bg-purple-100'
                    ],
                    [
                        'title' => 'Statistiques et Rapports',
                        'description' => 'Générez des statistiques et des rapports pour améliorer la prise de décision.',
                        'icon' => 'chart-bar',
                        'color' => 'text-yellow-400',
                        'bg' => 'bg-yellow-100'
                    ],
                ];
            @endphp

            @foreach($features as $feature)
                <div class="border border-gray-100 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div class="p-6">
                        <div class="{{ $feature['bg'] }} rounded-full w-12 h-12 flex items-center justify-center bg-opacity-30 mb-4">
                            <i class="fas fa-{{ $feature['icon'] }} {{ $feature['color'] }} text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $feature['title'] }}</h3>
                        <p class="text-gray-500">{{ $feature['description'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>