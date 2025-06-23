@extends('home')

@section('content')
<div class="min-h-screen flex flex-col bg-gray-50">
    <main class="flex-grow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="text-center mb-12">
                <h1 class="text-3xl font-bold tracking-tight text-gray-800 sm:text-4xl">
                    <span class="bg-gradient-to-r from-purple-600 to-blue-500 bg-clip-text text-transparent">Signalement</span>
                </h1>
                <p class="mt-4 text-lg text-gray-500 max-w-2xl mx-auto">
                    Signalez en toute confiance un cas de violences faites aux enfants. 
                    Votre action peut sauver une vie.
                </p>
            </div>
            
            <form method="POST" action="{{ route('signalement.store') }}" enctype="multipart/form-data" x-data="signalementForm">
                @csrf
                
                <!-- Onglets de navigation -->
                <div class="grid grid-cols-5 gap-2 mb-4">
                    <button 
                        type="button"
                        @click="activeTab = 'information'"
                        :class="{'bg-purple-600 text-white': activeTab === 'information', 'bg-gray-100 text-gray-800': activeTab !== 'information'}"
                        class="py-2 px-4 rounded-md text-sm font-medium transition-colors"
                    >
                        Témoins
                    </button>
                    <button 
                        type="button"
                        @click="activeTab = 'victime'"
                        :class="{'bg-purple-600 text-white': activeTab === 'victime', 'bg-gray-100 text-gray-800': activeTab !== 'victime'}"
                        class="py-2 px-4 rounded-md text-sm font-medium transition-colors"
                    >
                        Victime
                    </button>
                    <button 
                        type="button"
                        @click="activeTab = 'faits'"
                        :class="{'bg-purple-600 text-white': activeTab === 'faits', 'bg-gray-100 text-gray-800': activeTab !== 'faits'}"
                        class="py-2 px-4 rounded-md text-sm font-medium transition-colors"
                    >
                        Description
                    </button>
                    <button 
                        type="button"
                        @click="activeTab = 'localisation'"
                        :class="{'bg-purple-600 text-white': activeTab === 'localisation', 'bg-gray-100 text-gray-800': activeTab !== 'localisation'}"
                        class="py-2 px-4 rounded-md text-sm font-medium transition-colors"
                    >
                        Localisation
                    </button>
                    <button 
                        type="button"
                        @click="activeTab = 'preuves'"
                        :class="{'bg-purple-600 text-white': activeTab === 'preuves', 'bg-gray-100 text-gray-800': activeTab !== 'preuves'}"
                        class="py-2 px-4 rounded-md text-sm font-medium transition-colors"
                    >
                        Preuves
                    </button>
                </div>

                <!-- Section Témoin -->
                <div x-show="activeTab === 'information'" class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <div class="flex items-center mb-6">
                        <i class="fas fa-user text-purple-600 mr-2"></i>
                        <h2 class="text-xl font-bold">Informations du témoin</h2>
                    </div>
                    
                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="temoin[nom_complet]" class="block text-sm font-medium text-gray-700">Nom complet*</label>
                                <input 
                                    id="temoin[nom_complet]"
                                    name="temoin[nom_complet]"
                                    type="text" 
                                    required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500"
                                    placeholder="Votre nom complet"
                                    x-model="temoin.nom_complet"
                                />
                            </div>
                            <div class="space-y-2">
                                <label for="temoin[contact]" class="block text-sm font-medium text-gray-700">Contact*</label>
                                <input 
                                    id="temoin[contact]"
                                    name="temoin[contact]"
                                    type="text" 
                                    required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500"
                                    placeholder="Votre numéro de téléphone"
                                    x-model="temoin.contact"
                                />
                            </div>
                            <div class="space-y-2">
                                <label for="temoin[relation_victime]" class="block text-sm font-medium text-gray-700">Relation avec la victime*</label>
                                <input 
                                    id="temoin[relation_victime]"
                                    name="temoin[relation_victime]"
                                    type="text" 
                                    required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500"
                                    placeholder="Ex: Parent, Enseignant, Voisin..."
                                    x-model="temoin.relation_victime"
                                />
                            </div>
                        </div>
                        
                        <div class="flex justify-end">
                            <button 
                                @click="activeTab = 'victime'"
                                type="button"
                                class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-md shadow-sm"
                            >
                                Suivant
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Section Victime -->
                <div x-show="activeTab === 'victime'" class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <div class="flex items-center mb-6">
                        <i class="fas fa-child text-purple-600 mr-2"></i>
                        <h2 class="text-xl font-bold">Informations sur la victime</h2>
                    </div>
                    
                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="victime[anonyme]" class="block text-sm font-medium text-gray-700">Anonymat*</label>
                                <select 
                                    id="victime[anonyme]"
                                    name="victime[anonyme]"
                                    required
                                    x-model="victime.anonyme"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500"
                                >
                                    <option value="1">Victime anonyme</option>
                                    <option value="0">Victime identifiée</option>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label for="victime[age]" class="block text-sm font-medium text-gray-700">Âge*</label>
                                <input 
                                    id="victime[age]"
                                    name="victime[age]"
                                    type="number" 
                                    required
                                    min="0"
                                    max="18"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500"
                                    placeholder="Âge de la victime"
                                    x-model="victime.age"
                                />
                            </div>
                            <div class="space-y-2">
                                <label for="victime[genre]" class="block text-sm font-medium text-gray-700">Genre*</label>
                                <select 
                                    id="victime[genre]"
                                    name="victime[genre]"
                                    required
                                    x-model="victime.genre"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500"
                                >
                                    <option value="Masculin">Masculin</option>
                                    <option value="Féminin">Féminin</option>
                                    <option value="Autre">Autre</option>
                                </select>
                            </div>
                            <div class="space-y-2" x-show="victime.anonyme == 0">
                                <label for="victime[telephone]" class="block text-sm font-medium text-gray-700">Téléphone</label>
                                <input 
                                    id="victime[telephone]"
                                    name="victime[telephone]"
                                    type="tel" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500"
                                    placeholder="Téléphone de la victime"
                                    x-model="victime.telephone"
                                />
                            </div>
                        </div>
                        
                        <div class="flex justify-between">
                            <button 
                                @click="activeTab = 'information'"
                                type="button"
                                class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md shadow-sm"
                            >
                                Retour
                            </button>
                            <button 
                                @click="activeTab = 'faits'"
                                type="button"
                                class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-md shadow-sm"
                            >
                                Suivant
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Section Description des faits -->
                <div x-show="activeTab === 'faits'" class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <div class="flex items-center mb-6">
                        <i class="fas fa-align-left text-purple-600 mr-2"></i>
                        <h2 class="text-xl font-bold">Description des faits</h2>
                    </div>
                    
                    <div class="space-y-6">
                        <div class="space-y-2">
                            <label for="signalement[description]" class="block text-sm font-medium text-gray-700">Description détaillée*</label>
                            <textarea 
                                id="signalement[description]"
                                name="signalement[description]"
                                rows="6"
                                required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500"
                                placeholder="Décrivez les faits avec le plus de détails possible (quoi, quand, comment)..."
                                x-model="signalement.description"
                            ></textarea>
                        </div>
                        
                        <div class="space-y-2">
                            <label for="signalement[niveau_urgence]" class="block text-sm font-medium text-gray-700">Niveau d'urgence*</label>
                            <select 
                                id="signalement[niveau_urgence]"
                                name="signalement[niveau_urgence]"
                                required
                                x-model="signalement.niveau_urgence"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500"
                            >
                                <option value="standard">Standard</option>
                                <option value="urgent">Urgent</option>
                            </select>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="type_violence[nom]" class="block text-sm font-medium text-gray-700">Type de violence*</label>
                                <select
                                    id="type_violence[nom]"
                                    name="type_violence[nom]"
                                    required
                                    x-model="typeViolence.nom"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500"
                                >
                                    <option value="">Sélectionnez un type</option>
                                    <option value="Violence physique">Violence physique</option>
                                    <option value="Violence psychologique">Violence psychologique</option>
                                    <option value="Violence sexuelle">Violence sexuelle</option>
                                    <option value="Négligence">Négligence</option>
                                    <option value="Exploitation">Exploitation</option>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label for="type_violence[sous_categorie]" class="block text-sm font-medium text-gray-700">Sous-catégorie</label>
                                <input 
                                    id="type_violence[sous_categorie]"
                                    name="type_violence[sous_categorie]"
                                    type="text" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500"
                                    placeholder="Ex: Blessures, Harcèlement..."
                                    x-model="typeViolence.sous_categorie"
                                />
                            </div>
                        </div>
                        
                        <div class="flex justify-between">
                            <button 
                                @click="activeTab = 'victime'"
                                type="button"
                                class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md shadow-sm"
                            >
                                Retour
                            </button>
                            <button 
                                @click="activeTab = 'localisation'"
                                type="button"
                                class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-md shadow-sm"
                            >
                                Suivant
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Section Localisation -->
                <div x-show="activeTab === 'localisation'" class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <div class="flex items-center mb-6">
                        <i class="fas fa-map-marker-alt text-purple-600 mr-2"></i>
                        <h2 class="text-xl font-bold">Localisation</h2>
                    </div>

                    <div class="space-y-6">
                        <div class="flex justify-center">
                            <button 
                                type="button"
                                @click="getLocation"
                                :disabled="locationLoading"
                                class="flex items-center justify-center px-6 py-3 rounded-lg shadow-md transition-all"
                                :class="{
                                    'bg-blue-500 hover:bg-blue-600 text-white': !locationLoading,
                                    'bg-gray-300 cursor-not-allowed': locationLoading
                                }"
                            >
                                <template x-if="locationLoading">
                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </template>
                                <template x-if="!locationLoading">
                                    <i class="fas fa-location-arrow mr-2"></i>
                                </template>
                                Localiser automatiquement
                            </button>
                        </div>

                        <div x-show="localisation.latitude && localisation.longitude" 
                             class="h-64 rounded-lg overflow-hidden border border-gray-200 shadow-sm">
                            <div id="map-preview" class="h-full w-full"></div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="flex items-center text-sm font-medium text-gray-700">
                                    Latitude
                                    <span x-show="localisation.latitude" class="ml-2 text-green-500">
                                        <i class="fas fa-check-circle"></i>
                                    </span>
                                </label>
                                <div class="relative">
                                    <input 
                                        name="localisation[latitude]" 
                                        type="text" 
                                        x-model="localisation.latitude"
                                        readonly
                                        class="w-full pl-3 pr-8 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 bg-gray-50"
                                    >
                                    <span class="absolute right-3 top-2.5 text-gray-400">°</span>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="flex items-center text-sm font-medium text-gray-700">
                                    Longitude
                                    <span x-show="localisation.longitude" class="ml-2 text-green-500">
                                        <i class="fas fa-check-circle"></i>
                                    </span>
                                </label>
                                <div class="relative">
                                    <input 
                                        name="localisation[longitude]" 
                                        type="text" 
                                        x-model="localisation.longitude"
                                        readonly
                                        class="w-full pl-3 pr-8 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 bg-gray-50"
                                    >
                                    <span class="absolute right-3 top-2.5 text-gray-400">°</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="flex items-center text-sm font-medium text-gray-700">
                                Adresse complète
                                <span x-show="localisation.adresse" class="ml-2 text-green-500">
                                    <i class="fas fa-check-circle"></i>
                                </span>
                            </label>
                            <textarea 
                                name="localisation[adresse]" 
                                x-model="localisation.adresse"
                                readonly
                                rows="2"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 bg-gray-50"
                            ></textarea>
                        </div>

                        <div class="space-y-2">
                            <label for="localisation[zone_administrative]" class="block text-sm font-medium text-gray-700">
                                Zone administrative*
                            </label>
                            <input 
                                id="localisation[zone_administrative]"
                                name="localisation[zone_administrative]"
                                type="text" 
                                required
                                x-model="localisation.zone_administrative"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500"
                                placeholder="Ex: Commune, Quartier, Arrondissement..."
                            >
                        </div>

                        <div class="flex justify-between pt-4">
                            <button 
                                @click="activeTab = 'faits'"
                                type="button"
                                class="flex items-center justify-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-md shadow-sm transition-colors"
                            >
                                <i class="fas fa-arrow-left mr-2"></i> Retour
                            </button>
                            <button 
                                @click="activeTab = 'preuves'"
                                type="button"
                                :disabled="!localisation.latitude || !localisation.longitude"
                                class="flex items-center justify-center px-4 py-2 rounded-md shadow-sm transition-colors"
                                :class="{
                                    'bg-purple-600 hover:bg-purple-700 text-white': localisation.latitude && localisation.longitude,
                                    'bg-gray-300 text-gray-500 cursor-not-allowed': !localisation.latitude || !localisation.longitude
                                }"
                            >
                                Suivant <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Section Preuves -->
                <div x-show="activeTab === 'preuves'" class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <div class="flex items-center mb-6">
                        <i class="fas fa-paperclip text-purple-600 mr-2"></i>
                        <h2 class="text-xl font-bold">Preuves</h2>
                    </div>
                    
                    <div class="space-y-6">
                        <div class="space-y-2">
                            <label for="preuve[type]" class="block text-sm font-medium text-gray-700">Type de preuve*</label>
                            <select 
                                name="preuve[type]"
                                required
                                x-model="preuve.type"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500"
                            >
                                <option value="">Sélectionnez un type</option>
                                <option value="photo">Photo</option>
                                <option value="audio">Enregistrement audio</option>
                                <option value="vidéo">Vidéo</option>
                                <option value="document">Document</option>
                            </select>
                        </div>
                        
                        <div class="space-y-2">
                            <label for="preuve[chemin_fichier]" class="block text-sm font-medium text-gray-700">Fichier*</label>
                            <input 
                                id="preuve[chemin_fichier]"
                                name="preuve[chemin_fichier][]"
                                type="file" 
                                required
                                multiple
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500"
                                accept="image/*,audio/*,video/*,.pdf,.doc,.docx"
                                @change="handleFileUpload"
                            />
                            <p class="mt-1 text-sm text-gray-500">Formats acceptés : images, audio, vidéo, PDF, Word (max 5MB)</p>
                            
                            <template x-if="preuve.files.length > 0">
                                <div class="mt-4">
                                    <h4 class="text-sm font-medium text-gray-700 mb-2">Fichiers sélectionnés:</h4>
                                    <ul class="space-y-2">
                                        <template x-for="(file, index) in preuve.files" :key="index">
                                            <li class="flex items-center text-sm text-gray-600">
                                                <i class="fas fa-file mr-2"></i>
                                                <span x-text="file.name"></span>
                                                <button type="button" @click="removeFile(index)" class="ml-2 text-red-500">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </li>
                                        </template>
                                    </ul>
                                </div>
                            </template>
                        </div>
                        
                        <div class="flex justify-between">
                            <button 
                                @click="activeTab = 'localisation'"
                                type="button"
                                class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md shadow-sm"
                            >
                                Retour
                            </button>
                            <button 
                                type="submit"
                                class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-md shadow-sm"
                            >
                                Envoyer le signalement
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-medium text-gray-800 flex items-center">
                    <i class="fas fa-info-circle text-purple-600 mr-2"></i>
                    Comment fonctionne notre système de signalement ?
                </h3>
                <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 bg-purple-100 rounded-full p-2">
                            <i class="fas fa-shield-alt text-purple-600"></i>
                        </div>
                        <div class="ml-3">
                            <h4 class="text-sm font-medium text-gray-800">Confidentialité</h4>
                            <p class="mt-1 text-sm text-gray-500">Vos informations sont protégées et traitées avec la plus stricte confidentialité.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 bg-purple-100 rounded-full p-2">
                            <i class="fas fa-clock text-purple-600"></i>
                        </div>
                        <div class="ml-3">
                            <h4 class="text-sm font-medium text-gray-800">Traitement rapide</h4>
                            <p class="mt-1 text-sm text-gray-500">Votre signalement sera traité dans les 24 heures.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 bg-purple-100 rounded-full p-2">
                            <i class="fas fa-qrcode text-purple-600"></i>
                        </div>
                        <div class="ml-3">
                            <h4 class="text-sm font-medium text-gray-800">Suivi</h4>
                            <p class="mt-1 text-sm text-gray-500">Vous recevrez un code de suivi pour consulter l'avancement.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    @include('assistant-button')
</div>

<!-- Intégration de Leaflet pour la carte -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('signalementForm', () => ({
        activeTab: 'information',
        temoin: {
            nom_complet: '',
            contact: '',
            relation_victime: ''
        },
        victime: {
            anonyme: '1',
            age: '',
            genre: 'Masculin',
            telephone: ''
        },
        signalement: {
            description: '',
            niveau_urgence: 'standard'
        },
        typeViolence: {
            nom: '',
            sous_categorie: ''
        },
        localisation: {
            latitude: '',
            longitude: '',
            adresse: '',
            zone_administrative: ''
        },
        preuve: {
            type: '',
            files: []
        },
        locationLoading: false,
        locationError: null,
        map: null,
        marker: null,
        
        init() {
            this.$watch('localisation', (value) => {
                if (value.latitude && value.longitude) {
                    this.initMap();
                }
            });
        },
        
        getLocation() {
            this.locationLoading = true;
            this.locationError = null;

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        this.localisation.latitude = position.coords.latitude.toFixed(6);
                        this.localisation.longitude = position.coords.longitude.toFixed(6);
                        this.reverseGeocode(position.coords);
                        this.locationLoading = false;
                    },
                    (error) => {
                        this.handleLocationError(error);
                    },
                    {
                        enableHighAccuracy: true,
                        timeout: 10000,
                        maximumAge: 0
                    }
                );
            } else {
                this.locationError = "La géolocalisation n'est pas supportée par votre navigateur.";
                this.locationLoading = false;
                this.showErrorToast();
            }
        },

        reverseGeocode(coords) {
            fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${coords.latitude}&lon=${coords.longitude}`)
                .then(response => response.json())
                .then(data => {
                    this.localisation.adresse = data.display_name || 'Adresse non disponible';
                    this.localisation.zone_administrative = this.extractZoneAdministrative(data.address);
                })
                .catch(error => {
                    console.error('Reverse geocoding error:', error);
                    this.localisation.adresse = 'Adresse non disponible';
                });
        },

        extractZoneAdministrative(address) {
            return address?.city || 
                   address?.town || 
                   address?.village || 
                   address?.county || 
                   address?.state || 
                   'Zone inconnue';
        },

        initMap() {
            if (!this.map && this.localisation.latitude && this.localisation.longitude) {
                this.$nextTick(() => {
                    this.map = L.map('map-preview').setView(
                        [this.localisation.latitude, this.localisation.longitude], 
                        15
                    );

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                    }).addTo(this.map);

                    this.marker = L.marker([
                        this.localisation.latitude, 
                        this.localisation.longitude
                    ]).addTo(this.map)
                      .bindPopup("Position détectée")
                      .openPopup();
                });
            } else if (this.map) {
                this.map.setView(
                    [this.localisation.latitude, this.localisation.longitude], 
                    15
                );
                this.marker.setLatLng([
                    this.localisation.latitude, 
                    this.localisation.longitude
                ]);
            }
        },

        handleLocationError(error) {
            this.locationLoading = false;
            let errorMessage = "";
            
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    errorMessage = "Vous avez refusé l'accès à votre position. Veuillez autoriser la géolocalisation dans les paramètres de votre navigateur.";
                    break;
                case error.POSITION_UNAVAILABLE:
                    errorMessage = "Les informations de localisation ne sont pas disponibles.";
                    break;
                case error.TIMEOUT:
                    errorMessage = "La demande de géolocalisation a expiré. Veuillez réessayer.";
                    break;
                default:
                    errorMessage = "Une erreur inconnue s'est produite lors de la localisation.";
                    break;
            }
            
            alert(errorMessage);
        },
        
        handleFileUpload(event) {
            this.preuve.files = Array.from(event.target.files);
        },
        
        removeFile(index) {
            this.preuve.files.splice(index, 1);
            
            const fileInput = document.getElementById('preuve[chemin_fichier]');
            const dataTransfer = new DataTransfer();
            
            this.preuve.files.forEach(file => {
                dataTransfer.items.add(file);
            });
            
            fileInput.files = dataTransfer.files;
        },
        
        submitForm() {
            this.$el.submit();
        }
    }));
});
</script>
@endsection