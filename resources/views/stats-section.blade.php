<section class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
        <!-- Titre -->
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-500">
                <span class="bg-gradient-to-r from-purple-500 to-purple-700 bg-clip-text text-transparent">Notre impact</span>
            </h2>
            <p class="mt-3 text-lg text-gray-500">
                Ensemble, nous œuvrons pour un environnement plus sûr pour tous les enfants.
            </p>
        </div>

        <!-- Statistiques -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            @foreach([
                ['value' => '97%', 'label' => 'Taux de traitement', 'icon' => 'shield-alt', 'color' => 'bg-purple-100 text-purple-500'],
                ['value' => '45+', 'label' => 'Partenaires', 'icon' => 'users', 'color' => 'bg-yellow-100 text-yellow-500'],
                ['value' => '24h', 'label' => 'Délai moyen', 'icon' => 'clock', 'color' => 'bg-purple-100 text-purple-500'],
                ['value' => '10k+', 'label' => 'Signalements', 'icon' => 'file-alt', 'color' => 'bg-yellow-100 text-yellow-500']
            ] as $stat)
            <div class="bg-white rounded-lg shadow-md p-6 text-center transition-transform hover:-translate-y-1">
                <div class="{{ $stat['color'] }} w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-{{ $stat['icon'] }} text-lg"></i>
                </div>
                <h3 class="text-3xl font-extrabold text-gray-600">{{ $stat['value'] }}</h3>
                <p class="mt-2 text-gray-500">{{ $stat['label'] }}</p>
            </div>
            @endforeach
        </div>

        <!-- Graphiques -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Graphique à barres -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold text-gray-600 mb-4">
                    <i class="fas fa-chart-bar text-purple-500 mr-2"></i>
                    Signalements mensuels
                </h3>
                <div class="h-80">
                    <canvas id="barChart"></canvas>
                </div>
            </div>

            <!-- Camembert -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold text-gray-600 mb-4">
                    <i class="fas fa-shield-alt text-purple-500 mr-2"></i>
                    Types de violences
                </h3>
                <div class="h-80">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Graphique à barres
    const barCtx = document.getElementById('barChart').getContext('2d');
    new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
            datasets: [{
                label: 'Signalements',
                data: [45, 52, 49, 63, 58, 48],
                backgroundColor: '#9b87f5',
                borderRadius: 4
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#f5f5f7'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            },
            plugins: {
                tooltip: {
                    backgroundColor: '#ffffff',
                    titleColor: '#1a1f2c',
                    bodyColor: '#6b7280',
                    borderColor: '#e5e7eb',
                    borderWidth: 1,
                    padding: 12,
                    boxShadow: '0 4px 6px -1px rgba(0, 0, 0, 0.1)'
                }
            }
        }
    });

    // Camembert
    const pieCtx = document.getElementById('pieChart').getContext('2d');
    new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: ['Violence physique', 'Violence psychologique', 'Négligence', 'Abus sexuel', 'Exploitation'],
            datasets: [{
                data: [35, 25, 20, 15, 5],
                backgroundColor: [
                    '#9b87f5', 
                    '#7E69AB', 
                    '#6E59A5', 
                    '#1A1F2C', 
                    '#D6BCFA'
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `${context.label}: ${context.raw}%`;
                        }
                    },
                    backgroundColor: '#ffffff',
                    titleColor: '#1a1f2c',
                    bodyColor: '#6b7280',
                    borderColor: '#e5e7eb',
                    borderWidth: 1,
                    padding: 12,
                    boxShadow: '0 4px 6px -1px rgba(0, 0, 0, 0.1)'
                }
            }
        }
    });
});
</script>
@endpush