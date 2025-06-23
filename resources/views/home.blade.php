<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProtectEnfance - Protection de l'enfance</title>
    <link rel="stylesheet" href="style.css">
    <!-- Meta tags SEO -->
    <meta name="description" content="Plateforme de protection de l'enfance et de signalement des violences">
    
    <!-- Tailwind CSS avec configuration personnalisée -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4F46E5',
                        secondary: '#10B981',
                        danger: '#EF4444',
                        dark: '#1F2937',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Alpine JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Polices Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Fredoka+One&display=swap" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    
    @stack('styles')
</head>

<body class="font-sans antialiased bg-gray-50 flex flex-col min-h-screen">
    @include('navbar')
    
    <main class="flex-grow">
        @yield('content')
        
        @if(Request::is('/')) <!-- Seulement sur la page d'accueil -->
            @include('hero', [
                'images' => [
                    asset('images/images2.jpeg'),
                    asset('images/images8.jpg')
                ],
                'interval' => 5000,
                'height' => '100vh',
                'overlay' => 'rgba(0, 0, 0, 0.7)'
            ])
            
            @include('feature-cards')
            @include('stats-section')
            @include('call-to-action')
            
           
        @endif
    </main>
    <!-- Notification Toast -->
<div x-data="notification" 
     x-show="show" 
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 translate-y-2"
     x-transition:enter-end="opacity-100 translate-y-0"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 translate-y-0"
     x-transition:leave-end="opacity-0 translate-y-2"
     class="fixed bottom-4 right-4 z-50 w-full max-w-sm">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="p-4" :class="{
            'bg-green-100': type === 'success',
            'bg-red-100': type === 'error'
        }">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <template x-if="type === 'success'">
                        <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </template>
                    <template x-if="type === 'error'">
                        <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </template>
                </div>
                <div class="ml-3 w-0 flex-1 pt-0.5">
                    <h3 x-text="title" class="text-sm font-medium text-gray-900"></h3>
                    <p x-text="message" class="mt-1 text-sm text-gray-500"></p>
                    <template x-if="code_suivi">
                        <div class="mt-2">
                            <p class="text-sm font-medium">Code de suivi: <span x-text="code_suivi" class="font-bold"></span></p>
                            <a :href="'/suivi/' + code_suivi" class="text-sm text-primary hover:underline">Suivre mon signalement</a>
                        </div>
                    </template>
                </div>
                <div class="ml-4 flex-shrink-0 flex">
                    <button @click="show = false" class="inline-flex text-gray-400 hover:text-gray-500 focus:outline-none">
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('notification', () => ({
        show: false,
        type: 'success',
        title: '',
        message: '',
        code_suivi: null,
        numero_dossier: null,
        
        init() {
            // Vérifier s'il y a une notification en session
            @if(session('notification'))
                this.show = true;
                this.type = '{{ session('notification.type') }}';
                this.title = '{{ session('notification.title') }}';
                this.message = '{{ session('notification.message') }}';
                this.code_suivi = '{{ session('notification.code_suivi') }}';
                this.numero_dossier = '{{ session('notification.numero_dossier') }}';
                
                // Fermer automatiquement après 10 secondes
                setTimeout(() => {
                    this.show = false;
                }, 10000);
            @endif
        }
    }));
});
</script>
    
    @include('footer')
    @include('assistant-button')
    
    <!-- Scripts -->
    <script>
        // Gestion du menu mobile
        function toggleMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
            menu.classList.toggle('block');
        }
        
        // Initialisation Alpine.js pour le carousel
        document.addEventListener('alpine:init', () => {
            Alpine.data('imageCarousel', () => ({
                currentIndex: 0,
                images: [],
                interval: 5000,
                init() {
                    this.images = this.$el.querySelectorAll('.carousel-item');
                    setInterval(() => {
                        this.next();
                    }, this.interval);
                },
                next() {
                    this.currentIndex = (this.currentIndex + 1) % this.images.length;
                },
                prev() {
                    this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
                }
            }));
        });
    </script>
    
    @vite(['resources/js/app.js'])
    @stack('scripts')
</body>
</html>