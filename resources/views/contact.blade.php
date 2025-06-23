@extends('home')

@section('content')
<div class="min-h-screen flex flex-col">
    
    
    <main class="flex-grow">
        <!-- En-tête avec carousel -->
        <section class="relative h-72">
            <div class="absolute inset-0 bg-white-900 opacity-75"></div>
            <img src="{{ $contactImages[0] }}" alt="Contact" class="w-full h-full object-cover">
            
            <div class="absolute inset-0 flex flex-col justify-center items-center z-10 text-center px-4">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                    Contactez-nous
                </h1>
                <p class="text-xl text-white max-w-2xl">
                    Notre équipe est à votre disposition pour toute question concernant la protection des enfants.
                </p>
            </div>
        </section>
        
        <!-- Section de contact principale -->
        <section class="py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Informations de contact -->
                <div class="lg:col-span-1 space-y-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Nos coordonnées</h2>
                    
                    @include('info-card', [
                        'icon' => 'phone',
                        'title' => 'Téléphone',
                        'content' => '+123 456 789',
                        'note' => 'Du lundi au vendredi, 9h-18h'
                    ])
                    
                    @include('info-card', [
                    'icon' => 'mail',
                    'title' => 'Email',
                    'content' => 'contact@sgve.org',
                    'note' => 'Nous répondons sous 24h'
])
                    
                    <!-- Répétez pour les autres cartes -->
                    
                    <div class="p-4 bg-yellow-100 rounded-lg border border-yellow-200">
                        <div class="flex items-start">
                            <x-icon.help-circle class="h-6 w-6 text-yellow-600 mr-3 flex-shrink-0 mt-1" />
                            <div>
                                <h3 class="font-medium text-gray-800">Urgence</h3>
                                <p class="text-sm text-gray-600 mt-1">
                                    En cas d'urgence, contactez le <span class="font-bold">112</span> ou le <span class="font-bold">119</span>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Formulaire de contact -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-lg shadow p-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                            <x-icon.message-square class="h-5 w-5 mr-2" />
                            Envoyez-nous un message
                        </h2>
                        
                        <form method="POST" action="{{ route('contact.submit') }}" class="space-y-5">
                            @csrf
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div class="space-y-2">
                                    <label for="nom" class="block text-sm font-medium text-gray-700">
                                        Nom complet *
                                    </label>
                                    <input type="text" id="nom" name="nom" required
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500">
                                </div>
                                
                                <div class="space-y-2">
                                    <label for="email" class="block text-sm font-medium text-gray-700">
                                        Email *
                                    </label>
                                    <input type="email" id="email" name="email" required
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500">
                                </div>
                            </div>
                            
                            <!-- Continuez avec les autres champs du formulaire -->
                            
                            <div>
                                <button type="submit" class="w-full md:w-auto bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-md flex items-center">
                                    <x-icon.send-horizontal class="mr-2 h-4 w-4" />
                                    Envoyer le message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- FAQ Section -->
        <section class="bg-gray-50 py-12 px-4">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">
                    Foire aux questions
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto">
                    @foreach($faqs as $faq)
                        @include('faq-card', ['faq' => $faq])
                    @endforeach
                </div>
            </div>
        </section>
    </main>
    
   
    @include('assistant-button')
</div>
@endsection