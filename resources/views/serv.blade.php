<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord Admin | NoVi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }
        .sidebar-item.active {
            background-color: rgba(167, 139, 250, 0.1);
            border-left: 3px solidrgb(87, 18, 247);
        }
        .sidebar-item:hover:not(.active) {
            background-color: rgba(167, 139, 250, 0.05);
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 bg-white border-r border-gray-200">
                <div class="flex items-center h-16 px-4 border-b border-gray-200">
                    <div class="flex items-center">
                        <svg class="h-8 w-8 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <span class="ml-2 text-xl font-bold text-gray-800">NoVi</span>
                    </div>
                </div>
                <div class="flex flex-col flex-grow px-4 py-4 overflow-y-auto">
                    <nav class="flex-1 space-y-2">
                        <a href="#" class="sidebar-item flex items-center px-3 py-2 text-sm font-medium text-gray-900 rounded-md" id="dashboard-tab" onclick="showTab('dashboard')">
                            <svg class="h-5 w-5 text-purple-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Tableau de bord
                        </a>
                        <a href="#" class="sidebar-item flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900" id="signalements-tab" onclick="showTab('signalements')">
                            <svg class="h-5 w-5 text-gray-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Signalements
                        </a>
                        <a href="#" class="sidebar-item flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900" id="utilisateurs-tab" onclick="showTab('utilisateurs')">
                            <svg class="h-5 w-5 text-gray-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            Utilisateurs
                        </a>
                        <a href="#" class="sidebar-item flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900" id="parametres-tab" onclick="showTab('parametres')">
                            <svg class="h-5 w-5 text-gray-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Paramètres
                        </a>
                    </nav>
                </div>
                <div class="p-4 border-t border-gray-200">
                    <a href="{{ route('login') }}" class="flex items-center w-full px-3 py-2 text-sm font-medium text-left text-gray-700 rounded-md hover:bg-gray-100">
                        <svg class="h-5 w-5 text-gray-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Déconnexion
                    </a>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Top navigation -->
            <div class="flex items-center justify-between h-16 px-4 bg-white border-b border-gray-200">
                <div class="flex items-center md:hidden">
                    <button class="text-gray-500 hover:text-gray-600 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <button class="p-1 text-gray-400 hover:text-gray-500 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
                        </button>
                    </div>
                    <div class="relative">
                        <button class="flex items-center focus:outline-none">
                            <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-purple-100">
                                <span class="text-sm font-medium text-purple-600">AD</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Content area -->
            <div class="flex-1 overflow-auto p-6 bg-gray-50">
                <div id="dashboard-content">
                    <div class="mb-6">
                        <h1 class="text-2xl font-bold text-gray-800">Tableau de bord Administrateur</h1>
                        @if(session('success'))
                            <div class="mt-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>

                    <!-- Stats cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Signalements totaux</p>
                                    <p class="mt-1 text-2xl font-semibold text-gray-900">{{ $signalements->count() }}</p>
                                </div>
                                <div class="p-3 rounded-lg bg-purple-50 text-purple-600">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Demandes partenaires</p>
                                    <p class="mt-1 text-2xl font-semibold text-gray-900">{{ $demandes->count() }}</p>
                                </div>
                                <div class="p-3 rounded-lg bg-yellow-50 text-yellow-600">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Partenaires actifs</p>
                                    <p class="mt-1 text-2xl font-semibold text-gray-900">{{ App\Models\Utilisateur::where('role', 'partner')->count() }}</p>
                                </div>
                                <div class="p-3 rounded-lg bg-green-50 text-green-600">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Cas en attente</p>
                                    <p class="mt-1 text-2xl font-semibold text-gray-900">{{ $signalements->where('statut', 'nouveau')->count() }}</p>
                                </div>
                                <div class="p-3 rounded-lg bg-blue-50 text-blue-600">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main content grid -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Signalements récents -->
                        <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                            <div class="px-6 py-4 border-b border-gray-100">
                                <h2 class="text-lg font-medium text-gray-900">Derniers signalements</h2>
                            </div>
                            <div class="divide-y divide-gray-100">
                                @forelse($signalements->take(5) as $signalement)
                                <div class="p-4 hover:bg-gray-50 transition-colors">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h3 class="font-medium text-gray-900">#{{ $signalement->id }}</h3>
                                            <p class="mt-1 text-sm text-gray-600">{{ Str::limit($signalement->description, 80) }}</p>
                                        </div>
                                        <span class="px-2.5 py-0.5 text-xs font-medium rounded-full 
                                            {{ $signalement->statut === 'nouveau' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800' }}">
                                            {{ $signalement->statut }}
                                        </span>
                                    </div>
                                </div>
                                @empty
                                <div class="p-4 text-center text-gray-500">
                                    Aucun signalement récent
                                </div>
                                @endforelse
                            </div>
                        </div>

                        <!-- Demandes en attente -->
                        <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                            <div class="px-6 py-4 border-b border-gray-100">
                                <h2 class="text-lg font-medium text-gray-900">Demandes de partenaires en attente</h2>
                            </div>
                            <div class="divide-y divide-gray-100">
                                @foreach($demandes as $demande)
                                <div class="p-4 hover:bg-gray-50 transition-colors">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h3 class="font-medium text-gray-900">{{ $demande->nom }}</h3>
                                            <p class="mt-1 text-sm text-gray-600">{{ $demande->email }}</p>
                                            <p class="mt-1 text-sm text-gray-500">
                                                Téléphone: {{ $demande->telephone ?? 'Non renseigné' }}
                                            </p>
                                            @if($demande->partner)
                                            <div class="mt-2">
                                                <p class="text-xs text-purple-600">
                                                    <strong>Organisation:</strong> {{ $demande->partner->nom_organisation }}
                                                </p>
                                                <p class="text-xs text-purple-600">
                                                    <strong>Spécialité:</strong> {{ $demande->partner->specialite }}
                                                </p>
                                                <p class="text-xs text-purple-600">
                                                    <strong>Zone couverte:</strong> {{ $demande->partner->zone_couverte }}
                                                </p>
                                            </div>
                                            @endif
                                        </div>
                                        <div>
                                            @if($demande->role === 'partner')
                                                <span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs">Approuvé</span>
                                            @else
                                                <form method="POST" action="{{ route('admin.validate_partner', $demande->id) }}" style="display:inline-block;">
                                                    @csrf
                                                    <button type="submit" class="px-3 py-1 bg-green-50 text-green-700 text-sm rounded-md hover:bg-green-100 transition-colors">Accepter</button>
                                                </form>
                                                <form method="POST" action="{{ route('utilisateur.delete', $demande->id) }}" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="px-3 py-1 bg-red-50 text-red-700 text-sm rounded-md hover:bg-red-100 transition-colors" onclick="return confirm('Supprimer cette demande ?')">Supprimer</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Demandes d'autorités en attente -->
                        <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden mt-8">
                            <div class="px-6 py-4 border-b border-gray-100">
                                <h2 class="text-lg font-medium text-gray-900">Demandes d'autorités en attente</h2>
                            </div>
                            <div class="divide-y divide-gray-100">
                                @php
                                    $autorites = \App\Models\Autorites::all();
                                @endphp
                                @foreach($autorites as $autorite)
                                <div class="p-4 hover:bg-gray-50 transition-colors">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h3 class="font-medium text-gray-900">{{ $autorite->nom }}</h3>
                                            @if(!empty($autorite->type))
                                                <p class="mt-1 text-sm text-gray-600">Type: {{ $autorite->type }}</p>
                                            @endif
                                            @if(!empty($autorite->contact_urgence))
                                                <p class="mt-1 text-sm text-gray-500">Contact urgence: {{ $autorite->contact_urgence }}</p>
                                            @endif
                                        </div>
                                        <div>
                                            @if($autorite->role === 'autorite')
                                                <span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs">Approuvé</span>
                                            @else
                                                <form method="POST" action="{{ route('admin.validate_autorite', $autorite->id) }}" style="display:inline-block;">
                                                    @csrf
                                                    <button type="submit" class="px-3 py-1 bg-green-50 text-green-700 text-sm rounded-md hover:bg-green-100 transition-colors">Accepter</button>
                                                </form>
                                                <form method="POST" action="{{ route('utilisateur.delete', $autorite->id) }}" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="px-3 py-1 bg-red-50 text-red-700 text-sm rounded-md hover:bg-red-100 transition-colors" onclick="return confirm('Supprimer cette demande ?')">Supprimer</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div id="signalements-content" style="display:none">
                    <h1 class="text-2xl font-bold mb-6 text-purple-700">Tous les signalements</h1>
                    <div class="overflow-x-auto bg-white rounded-lg shadow p-4">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Statut</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Niveau urgence</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Description</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Victime</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Témoin</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Type violence</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Localisation</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Preuves</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($signalements as $signalement)
                                <tr>
                                    <td class="px-4 py-2">{{ $signalement->id }}</td>
                                    <td class="px-4 py-2">{{ $signalement->date_creation }}</td>
                                    <td class="px-4 py-2">
                                        <form method="POST" action="{{ route('signalement.updateStatut', $signalement->id) }}" style="display:inline-block;">
                                            @csrf
                                            @method('PUT')
                                            <select name="statut" class="border rounded px-2 py-1 text-sm">
                                                <option value="brouillon" {{ $signalement->statut == 'brouillon' ? 'selected' : '' }}>Brouillon</option>
                                                <option value="en cours" {{ $signalement->statut == 'en cours' ? 'selected' : '' }}>En cours</option>
                                                <option value="cloturé" {{ $signalement->statut == 'cloturé' ? 'selected' : '' }}>Clôturé</option>
                                            </select>
                                            <button type="submit" class="ml-2 px-2 py-1 bg-purple-600 text-white rounded text-xs">Changer</button>
                                        </form>
                                        <form method="POST" action="{{ route('signalement.delete', $signalement->id) }}" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="ml-2 px-2 py-1 bg-red-600 text-white rounded text-xs" onclick="return confirm('Supprimer ce signalement ?')">Supprimer</button>
                                        </form>
                                    </td>
                                    <td class="px-4 py-2">{{ $signalement->niveau_urgence }}</td>
                                    <td class="px-4 py-2 max-w-xs truncate">{{ $signalement->description }}</td>
                                    <td class="px-4 py-2">
                                        @if($signalement->victime)
                                            {{ $signalement->victime->anonyme ? 'Anonyme' : $signalement->victime->age.' ans, '.$signalement->victime->genre }}
                                        @endif
                                    </td>
                                    <td class="px-4 py-2">
                                        @if($signalement->victime && $signalement->victime->temoin)
                                            {{ $signalement->victime->temoin->nom_complet }}<br>
                                            {{ $signalement->victime->temoin->contact }}
                                        @endif
                                    </td>
                                    <td class="px-4 py-2">
                                        @if($signalement->typeViolence)
                                            {{ $signalement->typeViolence->nom }}
                                            @if($signalement->typeViolence->sous_categorie)
                                                ({{ $signalement->typeViolence->sous_categorie }})
                                            @endif
                                        @endif
                                    </td>
                                    <td class="px-4 py-2">
                                        @if($signalement->localisation)
                                            {{ $signalement->localisation->zone_administrative }}<br>
                                            {{ $signalement->localisation->adresse }}
                                        @endif
                                    </td>
                                    <td class="px-4 py-2">
                                        @if($signalement->preuves && $signalement->preuves->count())
                                            @foreach($signalement->preuves as $preuve)
                                                <span class="block text-xs">{{ $preuve->type }}</span>
                                            @endforeach
                                        @endif
                                        <!-- Bouton transmettre -->
                                        <button onclick="openTransmettreModal({{ $signalement->id }})" class="mt-2 px-2 py-1 bg-purple-500 text-white rounded text-xs">Transmettre</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Modal de transmission -->
                    <div id="transmettre-modal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
                        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                            <h2 class="text-lg font-bold mb-4 text-purple-700">Transmettre le signalement</h2>
                            <form id="transmettre-form" method="POST" action="">
                                @csrf
                                <input type="hidden" name="signalement_id" id="modal-signalement-id">
                                <label class="block mb-2 font-medium">Choisir le destinataire :</label>
                                <select name="destinataire_type" id="destinataire-type" class="w-full border rounded px-2 py-1 mb-4">
                                    <option value="">-- Sélectionner --</option>
                                    <option value="partenaire">Partenaire</option>
                                    <option value="autorite">Autorité</option>
                                </select>
                                <div id="partenaire-list" class="mb-4 hidden">
                                    <label class="block mb-2">Sélectionner un partenaire :</label>
                                    <select name="partenaire_id" class="w-full border rounded px-2 py-1">
                                        <option value="">-- Sélectionner --</option>
                                        @foreach(App\Models\Utilisateur::where('role', 'partner')->get() as $partenaire)
                                            <option value="{{ $partenaire->id }}">{{ $partenaire->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="autorite-list" class="mb-4 hidden">
                                    <label class="block mb-2">Sélectionner une autorité :</label>
                                    <select name="autorite_id" class="w-full border rounded px-2 py-1">
                                        <option value="">-- Sélectionner --</option>
                                        @foreach(App\Models\Utilisateur::where('role', 'autorite')->get() as $autorite)
                                            <option value="{{ $autorite->id }}">{{ $autorite->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex justify-end">
                                    <button type="button" onclick="closeTransmettreModal()" class="px-3 py-1 bg-gray-200 text-gray-700 rounded mr-2">Annuler</button>
                                    <button type="submit" class="px-3 py-1 bg-purple-600 text-white rounded">Envoyer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <script>
                        function openTransmettreModal(signalementId) {
                            document.getElementById('transmettre-modal').classList.remove('hidden');
                            document.getElementById('modal-signalement-id').value = signalementId;
                            document.getElementById('transmettre-form').action = '/signalement/' + signalementId + '/transmettre';
                        }
                        function closeTransmettreModal() {
                            document.getElementById('transmettre-modal').classList.add('hidden');
                        }
                        document.getElementById('destinataire-type').addEventListener('change', function() {
                            document.getElementById('partenaire-list').classList.toggle('hidden', this.value !== 'partenaire');
                            document.getElementById('autorite-list').classList.toggle('hidden', this.value !== 'autorite');
                        });
                    </script>
                </div>
                <div id="utilisateurs-content" style="display:none">
                    <h1 class="text-2xl font-bold mb-6 text-purple-700">Demandes de partenaires</h1>
                    <div class="overflow-x-auto bg-white rounded-lg shadow p-4 mb-8">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nom</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Téléphone</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Organisation</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Spécialité</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Zone couverte</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($demandes as $demande)
                                <tr>
                                    <td class="px-4 py-2">{{ $demande->nom }}</td>
                                    <td class="px-4 py-2">{{ $demande->email }}</td>
                                    <td class="px-4 py-2">{{ $demande->telephone ?? 'Non renseigné' }}</td>
                                    <td class="px-4 py-2">{{ $demande->partner->nom_organisation ?? '' }}</td>
                                    <td class="px-4 py-2">{{ $demande->partner->specialite ?? '' }}</td>
                                    <td class="px-4 py-2">{{ $demande->partner->zone_couverte ?? '' }}</td>
                                    <td class="px-4 py-2">
                                        @if($demande->role === 'partner')
                                            <span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs">Approuvé</span>
                                        @else
                                            <form method="POST" action="{{ route('admin.validate_partner', $demande->id) }}" style="display:inline-block;">
                                                @csrf
                                                <button type="submit" class="px-3 py-1 bg-green-50 text-green-700 text-sm rounded-md hover:bg-green-100 transition-colors">Accepter</button>
                                            </form>
                                            <form method="POST" action="{{ route('utilisateur.delete', $demande->id) }}" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1 bg-red-50 text-red-700 text-sm rounded-md hover:bg-red-100 transition-colors" onclick="return confirm('Supprimer cette demande ?')">Supprimer</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <h1 class="text-2xl font-bold mb-6 text-purple-700">Demandes d'autorités</h1>
                    <div class="overflow-x-auto bg-white rounded-lg shadow p-4">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nom</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Contact urgence</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @php $autorites_attente = \App\Models\Utilisateur::where('role', 'pending_autorite')->get(); @endphp
                                @foreach($autorites_attente as $autorite)
                                <tr>
                                    <td class="px-4 py-2">{{ $autorite->nom }}</td>
                                    <td class="px-4 py-2">{{ $autorite->type ?? '-' }}</td>
                                    <td class="px-4 py-2">{{ $autorite->contact_urgence ?? '-' }}</td>
                                    <td class="px-4 py-2">
                                        @if($autorite->role === 'autorite')
                                            <span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs">Approuvé</span>
                                        @else
                                            <form method="POST" action="{{ route('admin.validate_autorite', $autorite->id) }}" style="display:inline-block;">
                                                @csrf
                                                <button type="submit" class="px-3 py-1 bg-green-50 text-green-700 text-sm rounded-md hover:bg-green-100 transition-colors">Accepter</button>
                                            </form>
                                            <form method="POST" action="{{ route('utilisateur.delete', $autorite->id) }}" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1 bg-red-50 text-red-700 text-sm rounded-md hover:bg-red-100 transition-colors" onclick="return confirm('Supprimer cette demande ?')">Supprimer</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <h1 class="text-2xl font-bold mb-6 text-purple-700">Utilisateurs</h1>
                    <div class="overflow-x-auto bg-white rounded-lg shadow p-4">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nom</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($utilisateurs as $utilisateur)
                                <tr>
                                    <td class="px-4 py-2">{{ $utilisateur->nom }}</td>
                                    <td class="px-4 py-2">{{ $utilisateur->email }}</td>
                                    <td class="px-4 py-2">
                                        <form method="POST" action="{{ route('utilisateur.delete', $utilisateur->id) }}" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-2 py-1 bg-red-600 text-white rounded text-xs" onclick="return confirm('Supprimer cet utilisateur ?')">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="parametres-content" style="display:none">
                    <h1 class="text-2xl font-bold mb-6 text-purple-700">Paramètres</h1>
                    <div class="bg-white rounded-lg shadow p-4 text-gray-500">
                        Paramètre à venir
                    </div>
                </div>
            </div>
            <script>
                function showTab(tab) {
                    document.getElementById('dashboard-content').style.display = tab === 'dashboard' ? '' : 'none';
                    document.getElementById('signalements-content').style.display = tab === 'signalements' ? '' : 'none';
                    document.getElementById('utilisateurs-content').style.display = tab === 'utilisateurs' ? '' : 'none';
                    document.getElementById('parametres-content').style.display = tab === 'parametres' ? '' : 'none';
                    // Active class
                    document.getElementById('dashboard-tab').classList.toggle('active', tab === 'dashboard');
                    document.getElementById('signalements-tab').classList.toggle('active', tab === 'signalements');
                    document.getElementById('utilisateurs-tab').classList.toggle('active', tab === 'utilisateurs');
                    document.getElementById('parametres-tab').classList.toggle('active', tab === 'parametres');
                }
            </script>
        </div>
    </div>
</body>
</html>