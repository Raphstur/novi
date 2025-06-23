<nav class="bg-white shadow-md sticky top-0 z-30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <!-- Logo MASM à gauche -->
                <div class="flex-shrink-0">
                    <img src="{{ asset('images/logo-masm.png') }}" alt="Logo MASM" class="h-20">
                </div>
                <!-- Menu principal -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="{{ route('home') }}" class="text-gray-600 hover:text-purple-600 px-3 py-2 rounded-md text-sm font-medium flex items-center">
                            <i class="fas fa-home mr-1 h-4 w-4"></i>
                            Accueil
                        </a>
                        <a href="{{ route('signalement') }}" class="text-gray-600 hover:text-purple-600 px-3 py-2 rounded-md text-sm font-medium flex items-center">
                            <i class="fas fa-file-alt mr-1 h-4 w-4"></i>
                            Signaler
                        </a>
                        <a href="{{ route('ressources') }}" class="text-gray-600 hover:text-purple-600 px-3 py-2 rounded-md text-sm font-medium flex items-center">
                            <i class="fas fa-users mr-1 h-4 w-4"></i>
                            Ressources
                        </a>
                        <a href="{{ route('statistiques') }}" class="text-gray-600 hover:text-purple-600 px-3 py-2 rounded-md text-sm font-medium flex items-center">
                            <i class="fas fa-chart-bar mr-1 h-4 w-4"></i>
                            Statistiques
                        </a>
                        <a href="{{ route('contact') }}" class="text-gray-600 hover:text-purple-600 px-3 py-2 rounded-md text-sm font-medium flex items-center">
                            <i class="fas fa-phone mr-1 h-4 w-4"></i>
                            Contact
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Logo NoVi à droite -->
            <div class="hidden md:block">
                <div class="flex items-center">
                    <i class="fas fa-shield-alt h-8 w-8 text-purple-600"></i>
                    <span class="ml-2 text-xl font-bold bg-gradient-to-r from-purple-600 to-purple-800 bg-clip-text text-transparent">NoVi</span>
                </div>
            </div>
            
            <!-- Bouton Connexion avec menu déroulant corrigé -->
            <div class="hidden md:block relative" x-data="{ dropdownOpen: false }">
                <button @click="dropdownOpen = !dropdownOpen" class="text-white bg-purple-600 hover:bg-purple-700 px-4 py-2 rounded-md">Connexion</button>
                <div x-show="dropdownOpen" @click.away="dropdownOpen = false" class="absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                    <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                        <a href="{{ route('partner.register') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Inscription Partenaire</a>
                        <a href="{{ route('authority.register') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Inscription Autorité</a>
                        <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Se connecter</a>
                    </div>
                </div>
            </div>
            
            <div class="-mr-2 flex md:hidden">
                <button
                    @click="mobileMenuOpen = !mobileMenuOpen"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-white hover:bg-purple-600 focus:outline-none"
                    x-data="{ mobileMenuOpen: false }"
                >
                    <span class="sr-only">Ouvrir le menu</span>
                    <i class="fas fa-bars block h-6 w-6" x-show="!mobileMenuOpen"></i>
                    <i class="fas fa-times block h-6 w-6" x-show="mobileMenuOpen"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Menu mobile avec Alpine.js -->
    <div 
        class="md:hidden"
        x-show="mobileMenuOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        x-data="{ mobileMenuOpen: false }"
    >
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ route('home') }}" class="text-gray-600 hover:bg-purple-600 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                <i class="fas fa-home inline-block mr-2 h-4 w-4"></i>
                Accueil
            </a>
            <a href="{{ route('signalement') }}" class="text-gray-600 hover:bg-purple-600 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                <i class="fas fa-file-alt inline-block mr-2 h-4 w-4"></i>
                Signaler
            </a>
            <a href="{{ route('ressources') }}" class="text-gray-600 hover:bg-purple-600 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                <i class="fas fa-users inline-block mr-2 h-4 w-4"></i>
                Ressources
            </a>
            <a href="{{ route('statistiques') }}" class="text-gray-600 hover:bg-purple-600 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                <i class="fas fa-chart-bar inline-block mr-2 h-4 w-4"></i>
                Statistiques
            </a>
            <a href="{{ route('contact') }}" class="text-gray-600 hover:bg-purple-600 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                <i class="fas fa-phone inline-block mr-2 h-4 w-4"></i>
                Contact
            </a>
            <!-- Logo dans le menu mobile -->
            <div class="pt-4 border-t border-gray-200">
                <img src="{{ asset('images/logo-masm.png') }}" alt="Logo MASM" class="h-8 mx-auto">
            </div>
        </div>
    </div>
</nav>