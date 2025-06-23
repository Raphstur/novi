@extends('home')

@section('content')
<div class="min-h-screen flex flex-col">
    <!-- En-tête -->
    <div class="bg-gradient-to-r from-sgve-purple to-sgve-darkPurple py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-white mb-6">
                <span class="text-purple-600">
                    Statistiques
                </span>
            </h1>
            <p class="text-xl text-black/80 max-w-3xl mx-auto">
                Visualisez les données relatives aux signalements et interventions pour mieux comprendre l'impact de notre action collective.
            </p>
        </div>
    </div>
    
    <!-- Contenu principal -->
    <div class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                <div x-data="{ activeTab: 'general' }">
                    <!-- Onglets de navigation -->
                    <div class="flex flex-wrap justify-center gap-4 mb-8">
                        <button 
                            @click="activeTab = 'general'"
                            :class="{ 'bg-purple-600 text-white': activeTab === 'general', 'bg-gray-100 text-gray-800': activeTab !== 'general' }"
                            class="px-6 py-3 rounded-lg flex items-center transition-colors"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" y1="20" x2="18" y2="10"></line>
                                <line x1="12" y1="20" x2="12" y2="4"></line>
                                <line x1="6" y1="20" x2="6" y2="14"></line>
                            </svg>
                            Vue générale
                        </button>
                        <button 
                            @click="activeTab = 'types'"
                            :class="{ 'bg-purple-600 text-white': activeTab === 'types', 'bg-gray-100 text-gray-800': activeTab !== 'types' }"
                            class="px-6 py-3 rounded-lg flex items-center transition-colors"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                            Types de violences
                        </button>
                        <button 
                            @click="activeTab = 'demographic'"
                            :class="{ 'bg-purple-600 text-white': activeTab === 'demographic', 'bg-gray-100 text-gray-800': activeTab !== 'demographic' }"
                            class="px-6 py-3 rounded-lg flex items-center transition-colors"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            Données démographiques
                        </button>
                        <button 
                            @click="activeTab = 'geography'"
                            :class="{ 'bg-purple-600 text-white': activeTab === 'geography', 'bg-gray-100 text-gray-800': activeTab !== 'geography' }"
                            class="px-6 py-3 rounded-lg flex items-center transition-colors"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon>
                                <line x1="8" y1="2" x2="8" y2="18"></line>
                                <line x1="16" y1="6" x2="16" y2="22"></line>
                            </svg>
                            Répartition géographique
                        </button>
                    </div>

                    <!-- Contenu des onglets -->
                    <div x-show="activeTab === 'general'" class="space-y-8">
                        <!-- Graphique 1 -->
                        <div>
                            <h2 class="text-xl font-semibold mb-4 flex items-center text-purple-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-purple-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="12" y1="8" x2="12" y2="16"></line>
                                    <line x1="8" y1="12" x2="16" y2="12"></line>
                                </svg>
                                Évolution mensuelle des signalements et interventions
                            </h2>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="h-96">
                                    <!-- Ici vous intégrerez votre graphique avec Chart.js ou autre -->
                                    <canvas id="monthlyChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Graphique 2 -->
                        <div>
                            <h2 class="text-xl font-semibold mb-4 flex items-center text-purple-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-purple-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                </svg>
                                Évolution annuelle des signalements
                            </h2>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="h-96">
                                    <canvas id="annualChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Graphique 3 -->
                        <div>
                            <h2 class="text-xl font-semibold mb-4 flex items-center text-purple-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-purple-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                </svg>
                                Statut des signalements
                            </h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="bg-gray-50 p-4 rounded-lg h-80">
                                    <canvas id="statusChart"></canvas>
                                </div>
                                <div class="space-y-6">
                                    <div>
                                        <div class="flex items-center mb-2">
                                            <div class="w-4 h-4 bg-green-500 rounded-full mr-2"></div>
                                            <span class="font-medium">Traité (75%)</span>
                                        </div>
                                        <p class="text-gray-600 text-sm">
                                            La majorité des signalements sont traités dans les 72 heures suivant leur réception.
                                        </p>
                                    </div>
                                    <div>
                                        <div class="flex items-center mb-2">
                                            <div class="w-4 h-4 bg-orange-500 rounded-full mr-2"></div>
                                            <span class="font-medium">En cours (18%)</span>
                                        </div>
                                        <p class="text-gray-600 text-sm">
                                            Ces signalements sont actuellement en cours d'évaluation ou d'intervention par nos équipes et partenaires.
                                        </p>
                                    </div>
                                    <div>
                                        <div class="flex items-center mb-2">
                                            <div class="w-4 h-4 bg-red-500 rounded-full mr-2"></div>
                                            <span class="font-medium">En attente (7%)</span>
                                        </div>
                                        <p class="text-gray-600 text-sm">
                                            Ces cas nécessitent des informations complémentaires avant de pouvoir être traités.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Onglet Types de violences -->
                    <div x-show="activeTab === 'types'" class="space-y-8">
                        <!-- Graphique -->
                        <div>
                            <h2 class="text-xl font-semibold mb-4 flex items-center text-purple-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-purple-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                                    <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                                </svg>
                                Répartition par type de violence
                            </h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="bg-gray-50 p-4 rounded-lg h-80">
                                    <canvas id="violenceTypeChart"></canvas>
                                </div>
                                <div class="flex flex-col justify-center">
                                    <p class="mb-4">
                                        La violence physique reste la catégorie la plus signalée (35%), suivie de près par la violence psychologique (25%). 
                                        Ces données soulignent l'importance d'une intervention précoce et d'un accompagnement adapté.
                                    </p>
                                    <p>
                                        Notre système permet d'identifier et de catégoriser précisément les différentes formes de violences, 
                                        facilitant ainsi l'orientation vers les services d'aide et de protection les plus appropriés.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Tableau -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold mb-4 text-purple-600">Délai moyen d'intervention par type de violence</h3>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type de violence</th>
                                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Délai moyen</th>
                                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Évolution</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">Violence physique</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">12h</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-green-500">-15%</td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">Violence psychologique</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">24h</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-green-500">-8%</td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">Négligence</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">36h</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-green-500">-12%</td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">Abus sexuel</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">8h</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-green-500">-22%</td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">Exploitation</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">18h</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-green-500">-5%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Onglet Données démographiques -->
                    <div x-show="activeTab === 'demographic'" class="space-y-8">
                        <!-- Graphique -->
                        <div>
                            <h2 class="text-xl font-semibold mb-4 flex items-center text-purple-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-purple-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                Répartition par âge des victimes
                            </h2>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="h-96">
                                    <canvas id="ageDistributionChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Répartition par genre -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold mb-6 text-purple-600">Répartition par genre</h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="bg-white p-6 rounded-lg shadow-sm text-center">
                                    <div class="text-4xl font-bold text-purple-600 mb-2">52%</div>
                                    <div class="text-gray-600">Filles</div>
                                </div>
                                <div class="bg-white p-6 rounded-lg shadow-sm text-center">
                                    <div class="text-4xl font-bold text-purple-700 mb-2">47%</div>
                                    <div class="text-gray-600">Garçons</div>
                                </div>
                                <div class="bg-white p-6 rounded-lg shadow-sm text-center">
                                    <div class="text-4xl font-bold text-purple-400 mb-2">1%</div>
                                    <div class="text-gray-600">Autre/Non spécifié</div>
                                </div>
                            </div>
                        </div>

                        <!-- Contexte social -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold mb-6 text-purple-600">Contexte social des signalements</h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="bg-white p-6 rounded-lg shadow-sm">
                                    <div class="text-3xl font-bold text-purple-600 mb-2 text-center">65%</div>
                                    <div class="font-medium mb-2 text-center">Milieu familial</div>
                                    <p class="text-gray-600 text-sm">
                                        La majorité des cas sont signalés au sein du foyer familial
                                    </p>
                                </div>
                                <div class="bg-white p-6 rounded-lg shadow-sm">
                                    <div class="text-3xl font-bold text-purple-600 mb-2 text-center">18%</div>
                                    <div class="font-medium mb-2 text-center">Milieu scolaire</div>
                                    <p class="text-gray-600 text-sm">
                                        Détectés par les enseignants ou personnel éducatif
                                    </p>
                                </div>
                                <div class="bg-white p-6 rounded-lg shadow-sm">
                                    <div class="text-3xl font-bold text-purple-600 mb-2 text-center">17%</div>
                                    <div class="font-medium mb-2 text-center">Autres contextes</div>
                                    <p class="text-gray-600 text-sm">
                                        Incluant lieux publics et environnement numérique
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Onglet Répartition géographique -->
                    <div x-show="activeTab === 'geography'" class="space-y-8">
                        <!-- Graphique -->
                        <div>
                            <h2 class="text-xl font-semibold mb-4 flex items-center text-purple-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-purple-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon>
                                    <line x1="8" y1="2" x2="8" y2="18"></line>
                                    <line x1="16" y1="6" x2="16" y2="22"></line>
                                </svg>
                                Répartition par région des signalements
                            </h2>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="h-96">
                                    <canvas id="regionChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Répartition urbaine/rurale -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold mb-6 text-purple-600">Répartition urbaine/rurale</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="bg-white p-6 rounded-lg shadow-sm">
                                    <div class="text-4xl font-bold text-purple-600 mb-4 text-center">68%</div>
                                    <div class="font-medium mb-2 text-center">Zones urbaines</div>
                                    <p class="text-gray-600 text-sm mb-3">
                                        Les zones urbaines représentent la majorité des signalements, principalement en raison de:
                                    </p>
                                    <ul class="list-disc pl-5 text-gray-600 text-sm space-y-1">
                                        <li>Une densité de population plus élevée</li>
                                        <li>Un meilleur accès aux services de signalement</li>
                                        <li>Une sensibilisation accrue</li>
                                    </ul>
                                </div>
                                <div class="bg-white p-6 rounded-lg shadow-sm">
                                    <div class="text-4xl font-bold text-purple-700 mb-4 text-center">32%</div>
                                    <div class="font-medium mb-2 text-center">Zones rurales</div>
                                    <p class="text-gray-600 text-sm mb-3">
                                        Nos efforts pour améliorer l'accès dans les zones rurales incluent:
                                    </p>
                                    <ul class="list-disc pl-5 text-gray-600 text-sm space-y-1">
                                        <li>Des équipes mobiles d'intervention</li>
                                        <li>Des partenariats avec les structures locales</li>
                                        <li>Des campagnes de sensibilisation ciblées</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Méthodologie -->
            <div class="bg-white rounded-lg shadow-md p-6 mt-8">
                <h2 class="text-xl font-semibold mb-4 text-purple-600">Méthodologie et sources de données</h2>
                <p class="mb-4">
                    Les données présentées sont issues des signalements enregistrés sur la plateforme SGVE et 
                    des informations collectées auprès de nos partenaires institutionnels. 
                </p>
                <p>
                    Toutes les données sont anonymisées et traitées conformément au RGPD. Les statistiques sont 
                    mises à jour trimestriellement pour garantir leur pertinence et leur précision.
                </p>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Scripts pour initialiser les graphiques
    document.addEventListener('DOMContentLoaded', function() {
        // Données pour les graphiques (à adapter avec vos données réelles)
        const monthlyData = {
            labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
            datasets: [
                {
                    label: 'Signalements',
                    data: [65, 78, 82, 70, 85, 90],
                    backgroundColor: '#9b87f5',
                    borderRadius: 4
                },
                {
                    label: 'Interventions',
                    data: [45, 52, 70, 55, 62, 75],
                    backgroundColor: '#FEF7CD',
                    borderRadius: 4
                }
            ]
        };

        const annualData = {
            labels: ['2020', '2021', '2022', '2023', '2024', '2025'],
            datasets: [{
                label: 'Signalements',
                data: [520, 680, 790, 940, 1240, 850],
                fill: true,
                backgroundColor: 'rgba(155, 135, 245, 0.2)',
                borderColor: '#9b87f5',
                tension: 0.1
            }]
        };

        const statusData = {
            labels: ['Traité', 'En cours', 'En attente'],
            datasets: [{
                data: [75, 18, 7],
                backgroundColor: ['#48bb78', '#ed8936', '#f56565']
            }]
        };

        // Initialisation des graphiques
        new Chart(document.getElementById('monthlyChart'), {
            type: 'bar',
            data: monthlyData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        new Chart(document.getElementById('annualChart'), {
            type: 'line',
            data: annualData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        new Chart(document.getElementById('statusChart'), {
            type: 'doughnut',
            data: statusData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'right' }
                }
            }
        });

        // Ajoutez les autres graphiques de la même manière...
    });
</script>
@endpush
@endsection