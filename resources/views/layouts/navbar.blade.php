<nav class="bg-gray-800 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/" class="text-white text-lg font-bold">Application</a>

        <div class="flex space-x-4">
            @auth
                <a href="{{ route('logout') }}" class="text-white">Déconnexion</a>
            @else
                <a href="{{ route('login') }}" class="text-white">Connexion</a>
                <a href="{{ route('register') }}" class="text-white">Inscription</a>
            @endauth
        </div>
        <div class="flex items-center">
            <a href="{{ route('login') }}" class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-md">Connexion</a>
        </div>
    </div>
</nav>
