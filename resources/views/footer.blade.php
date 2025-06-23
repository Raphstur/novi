<footer class=" container-fluid bg-gray-800 text-white">
    <div class=" max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Colonne Logo et description -->
            <div class="col-span-1 md:col-span-1">
                <div class="flex items-center">
                    <i class="fas fa-shield-alt h-8 w-8 text-purpule-400"></i>
                    <span class="ml-2 text-xl font-bold text-white">NoVi</span>
                </div>
                <p class="mt-2 text-sm text-gray-300">
                    Système de Gestion des Violences faites aux Enfants. Ensemble pour la protection et le bien-être des plus vulnérables.
                </p>
                <div class="mt-4 flex space-x-4">
                    <a href="#" class="text-gray-300 hover:text-white-400">
                        <span class="sr-only">Facebook</span>
                        <i class="fab fa-facebook-f h-5 w-5"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white-400">
                        <span class="sr-only">Twitter</span>
                        <i class="fab fa-twitter h-5 w-5"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white-400">
                        <span class="sr-only">Instagram</span>
                        <i class="fab fa-instagram h-5 w-5"></i>
                    </a>
                </div>
            </div>

            <!-- Colonne Navigation -->
            <div class="col-span-1">
                <h3 class="text-sm font-semibold text-white-400 tracking-wider uppercase">Navigation</h3>
                <ul class="mt-4 space-y-2">
                    <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-white">Accueil</a></li>
                    <li><a href="{{ route('signalement') }}" class="text-gray-300 hover:text-white">Signaler</a></li>
                    <li><a href="{{ route('ressources') }}" class="text-gray-300 hover:text-white">Ressources</a></li>
                    <li><a href="{{ route('statistiques') }}" class="text-gray-300 hover:text-white">Statistiques</a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-white">Contact</a></li>
                </ul>
            </div>

            <!-- Colonne Ressources -->
            <div class="col-span-1">
                <h3 class="text-sm font-semibold text-white-400 tracking-wider uppercase">Ressources</h3>
                <ul class="mt-4 space-y-2">
                <li><a href="{{ route('ressources') }}" class="text-gray-300 hover:text-white">Documentation</a></li>
            <li><a href="{{ route('ressources') }}" class="text-gray-300 hover:text-white">Guides</a></li>
            <li><a href="{{ route('ressources') }}" class="text-gray-300 hover:text-white">Partenaires</a></li>
            <li><a href="{{ route('ressources') }}" class="text-gray-300 hover:text-white">Législation</a></li>
            <li><a href="{{ route('ressources') }}" class="text-gray-300 hover:text-white">FAQs</a>
            </div>

            <!-- Colonne Contact -->
            <div class="col-span-1">
                <h3 class="text-sm font-semibold text-black-400 tracking-wider uppercase">Contact</h3>
                <ul class="mt-4 space-y-2">
                    <li>
                        <a href="mailto:contact@sgve.org" class="text-gray-300 hover:text-white flex items-center">
                            <i class="fas fa-envelope h-4 w-4 mr-2"></i>
                            contact@sgve.org
                        </a>
                    </li>
                    <li>
                        <a href="tel:+123456789" class="text-gray-300 hover:text-white flex items-center">
                            <i class="fas fa-phone h-4 w-4 mr-2"></i>
                            +123 456 789
                        </a>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-map-marker-alt h-4 w-4 mr-2 mt-1 flex-shrink-0"></i>
                        <span class="text-gray-300">
                          cotonou haie vive,<br>
                            , 
                        </span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Bas de footer -->
        <div class="mt-12 border-t border-gray-700 pt-8">
            <p class="text-base text-gray-400 text-center">
                &copy; {{ date('Y') }} NoVi. Tous droits réservés.
            </p>
            <div class="mt-2 flex justify-center space-x-6">
                <a href="#" class="text-gray-400 hover:text-yellow-400">Mentions légales</a>
                <a href="#" class="text-gray-400 hover:text-yellow-400">Politique de confidentialité</a>
                <a href="#" class="text-gray-400 hover:text-yellow-400">Conditions d'utilisation</a>
            </div>
        </div>
    </div>

</footer>