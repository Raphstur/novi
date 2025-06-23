<div x-data="heroCarousel()" class="relative overflow-hidden text-white min-h-[90vh] flex items-center">
    <!-- Background carousel -->
    <div class="absolute inset-0 z-0">
        @if(empty($images))
            <div class="flex items-center justify-center h-full bg-gray-100">
                <i class="fas fa-baby text-5xl text-purple-400 mr-3"></i>
                <p class="text-gray-600">Aucune image disponible</p>
            </div>
        @else
            @foreach($images as $index => $src)
                <div 
                    x-show="currentImage === {{ $index }}"
                    x-transition:enter="transition ease-in-out duration-1000"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in-out duration-1000"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="absolute inset-0 bg-cover bg-center"
                    style="background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.7)), url({{ $src }})"
                ></div>
            @endforeach
        @endif
    </div>

    <!-- Contenu hero par-dessus les images -->
    <div class="relative z-10 max-w-6xl mx-auto px-4 w-full">
        <div class="grid grid-cols-1 gap-12 items-center">
            <div class="flex flex-col gap-8">
                <div>
                    <h1 class="text-4xl md:text-5xl font-extrabold leading-tight drop-shadow-lg">
                        <span class="block text-yellow-100">Système de Gestion</span>
                        <span class="block text-white mt-1">des Violences faites aux Enfants</span>
                    </h1>
                    <p class="mt-6 text-xl text-white max-w-3xl drop-shadow-sm">
                        Une plateforme sécurisée permettant de signaler et suivre les cas de maltraitance, 
                        exploitation et abus des enfants.
                    </p>
                </div>

                <div class="flex flex-row gap-4 flex-wrap">
                    <a href="{{ route('signalement') }}" 
                       class="group relative inline-flex items-center justify-center px-8 py-6 bg-yellow-100 text-gray-900 rounded-md font-bold text-lg shadow-md hover:bg-yellow-200 hover:-translate-y-0.5 transition-all duration-300">
                        <i class="fas fa-shield-alt mr-2"></i>
                        Signaler un cas
                    </a>

                    <a href="{{ route('ressources') }}" 
                       class="group relative inline-flex items-center justify-center px-8 py-6 border-2 border-yellow-100 text-yellow-100 rounded-md font-bold text-lg hover:bg-yellow-100 hover:text-gray-900 hover:-translate-y-0.5 transition-all duration-300">
                        En savoir plus
                    </a>
                </div>

                <div class="bg-yellow-100 bg-opacity-20 border-l-4 border-yellow-100 p-4 rounded-md backdrop-blur-sm">
                    <div class="flex items-start">
                        <i class="fas fa-exclamation-triangle text-yellow-100 mt-1 mr-3"></i>
                        <p class="text-sm text-yellow-100">
                            En cas d'urgence immédiate, veuillez contacter directement le service d'urgence au <strong>138</strong>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Image indicators -->
    @if(!empty($images) && count($images) > 1)
        <div class="absolute bottom-5 left-0 right-0 flex justify-center gap-3 z-10">
            @foreach($images as $index => $src)
                <button
                    @click="currentImage = {{ $index }}"
                    class="w-3 h-3 rounded-full transition-all duration-300"
                    :class="{ 'bg-yellow-100': currentImage === {{ $index }}, 'bg-white bg-opacity-50': currentImage !== {{ $index }} }"
                    aria-label="Changer d'image"
                ></button>
            @endforeach
        </div>
    @endif
</div>

<script>
    function heroCarousel() {
        return {
            currentImage: 0,
            images: @json($images ?? []),
            interval: {{ $interval ?? 5000 }},
            init() {
                if(this.images.length > 1) {
                    setInterval(() => {
                        this.currentImage = (this.currentImage + 1) % this.images.length;
                    }, this.interval);
                }
            }
        }
    }
</script>