<section class="relative overflow-hidden py-24">
    <!-- Background carousel avec Alpine.js -->
    <div x-data="{
        currentImage: 0,
        images: [
            'https://images.unsplash.com/photo-1605235186583-a8039ed85c2d?q=80&w=1950&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1523477800337-966dbabe060b?q=80&w=1950&auto=format&fit=crop'
        ],
        init() {
            setInterval(() => {
                this.currentImage = (this.currentImage + 1) % this.images.length;
            }, 6000);
        }
    }" class="absolute inset-0 z-0">
        <template x-for="(image, index) in images" :key="index">
            <div 
                x-show="currentImage === index"
                x-transition:enter="transition ease-in-out duration-1000"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in-out duration-1000"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="absolute inset-0 bg-cover bg-center"
                :style="'background: linear-gradient(to right, rgba(155, 135, 245, 0.95), rgba(26, 31, 44, 0.95)), url(' + image + ')'"
            ></div>
        </template>
    </div>

    <!-- Pattern overlay -->
    <div class="absolute inset-0 opacity-50" style="background-image: url('data:image/svg+xml,%3Csvg width=\"20\" height=\"20\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cpath d=\"M0 10a10 10 0 1 1 20 0 10 10 0 0 1-20 0z\" fill=\"%23ffffff\" fill-opacity=\"0.05\"/%3E%3C/svg%3E'); background-size: 30px 30px;"></div>

    <div class="max-w-6xl mx-auto px-4 text-center relative z-10">
        <h2 class="text-4xl md:text-5xl font-extrabold text-white drop-shadow-lg mb-6">
            <span class="block">Agissons ensemble pour protéger les enfants</span>
        </h2>
        
        <p class="text-xl text-yellow-100 mt-6 max-w-3xl mx-auto">
            Chaque signalement compte. Votre vigilance peut sauver une vie.
        </p>

        <div class="flex flex-wrap justify-center gap-4 mt-10">
            <a href="{{ route('signalement') }}" class="group relative inline-flex items-center justify-center px-10 py-6 bg-yellow-100 text-gray-900 rounded-lg font-bold text-xl shadow-lg hover:bg-yellow-200 hover:-translate-y-1 transition-all duration-300">
                <i class="fas fa-shield-alt mr-3 text-lg"></i>
                Signaler un cas maintenant
            </a>
            
            <a href="{{ route('ressources') }}" class="group relative inline-flex items-center justify-center px-10 py-6 border-2 border-yellow-100 text-yellow-100 rounded-lg font-bold text-xl hover:bg-yellow-100 hover:text-gray-900 hover:-translate-y-1 transition-all duration-300">
                En savoir plus
            </a>
        </div>
  <div class="flex justify-center mt-8">
                <a href="{{ route('suivi') }}" class="bg-primary text-white px-6 py-3 rounded-md shadow-md hover:bg-primary-dark">
                    Suivi votre signalement avec votre code de suivi
                </a>
            </div>
        <div class="mt-10 bg-white bg-opacity-10 backdrop-blur-sm border border-white border-opacity-20 rounded-lg p-6 max-w-4xl mx-auto shadow-lg">
            <div class="flex items-center justify-center">
                <i class="fas fa-exclamation-triangle text-yellow-100 text-2xl mr-4"></i>
                <p class="text-white text-left">
                    Si vous êtes témoin d'une situation d'urgence mettant en danger immédiat un enfant, contactez immédiatement les services d'urgence.
                </p>
            </div>
        </div>

        <!-- Image indicators -->
        <div class="absolute bottom-8 left-0 right-0 flex justify-center gap-2" x-data="{ currentImage: 0 }">
            <template x-for="(_, index) in 2" :key="index">
                <button
                    @click="currentImage = index"
                    class="w-3 h-3 rounded-full transition-all duration-300"
                    :class="{ 'bg-yellow-100': currentImage === index, 'bg-white bg-opacity-50': currentImage !== index }"
                    aria-label="Changer d'image"
                ></button>
            </template>
        </div>
    </div>
</section>