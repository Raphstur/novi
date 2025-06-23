<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord Partenaire | NoVi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8fafc; }
        .sidebar-item.active { background-color: rgba(167, 139, 250, 0.1); border-left: 3px solid rgb(87, 18, 247); }
        .sidebar-item:hover:not(.active) { background-color: rgba(167, 139, 250, 0.05); }
    </style>
</head>
<body class="bg-gray-50">
<div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <div class="hidden md:flex md:flex-shrink-0">
        <div class="flex flex-col w-64 bg-white border-r border-gray-200">
            <div class="flex items-center h-16 px-4 border-b border-gray-200">
                <span class="ml-2 text-xl font-bold text-gray-800">NoVi</span>
            </div>
            <div class="flex flex-col flex-grow px-4 py-4 overflow-y-auto">
                <nav class="flex-1 space-y-2">
                    <a href="#" class="sidebar-item flex items-center px-3 py-2 text-sm font-medium text-gray-900 rounded-md" id="dashboard-tab" onclick="showTab('dashboard')">Tableau de bord</a>
                    <a href="#" class="sidebar-item flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900" id="attribution-tab" onclick="showTab('attribution')">Attribution</a>
                    <a href="#" class="sidebar-item flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900" id="rapport-tab" onclick="showTab('rapport')">Rapport</a>
                    <a href="#" class="sidebar-item flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900" id="parametres-tab" onclick="showTab('parametres')">Paramètre</a>
                </nav>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <div class="flex flex-col flex-1 overflow-hidden">
        <div class="flex-1 overflow-auto p-6 bg-gray-50">
            <div id="dashboard-content">
                <h1 class="text-2xl font-bold text-purple-700 mb-6">Tableau de bord Partenaire</h1>
                <div class="bg-white rounded-lg shadow p-6">Bienvenue sur votre espace partenaire.</div>
            </div>
            <div id="attribution-content" style="display:none">
                <h1 class="text-2xl font-bold text-purple-700 mb-6">Attribution</h1>
                <div class="bg-white rounded-lg shadow p-6">
                    @if(isset($signalements) && count($signalements))
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Description</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Statut</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($signalements as $signalement)
                                    <tr>
                                        <td class="px-4 py-2">{{ $signalement->id }}</td>
                                        <td class="px-4 py-2">{{ $signalement->date_creation }}</td>
                                        <td class="px-4 py-2">{{ $signalement->description }}</td>
                                        <td class="px-4 py-2">{{ $signalement->statut }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div>Aucun signalement transmis.</div>
                    @endif
                </div>
            </div>
            <div id="rapport-content" style="display:none">
                <h1 class="text-2xl font-bold text-purple-700 mb-6">Rapport</h1>
                <div class="bg-white rounded-lg shadow p-6">Aucun rapport disponible.</div>
            </div>
            <div id="parametres-content" style="display:none">
                <h1 class="text-2xl font-bold text-purple-700 mb-6">Paramètre</h1>
                <div class="bg-white rounded-lg shadow p-6">Paramètres à venir.</div>
            </div>
        </div>
        <script>
            function showTab(tab) {
                document.getElementById('dashboard-content').style.display = tab === 'dashboard' ? '' : 'none';
                document.getElementById('attribution-content').style.display = tab === 'attribution' ? '' : 'none';
                document.getElementById('rapport-content').style.display = tab === 'rapport' ? '' : 'none';
                document.getElementById('parametres-content').style.display = tab === 'parametres' ? '' : 'none';
                document.getElementById('dashboard-tab').classList.toggle('active', tab === 'dashboard');
                document.getElementById('attribution-tab').classList.toggle('active', tab === 'attribution');
                document.getElementById('rapport-tab').classList.toggle('active', tab === 'rapport');
                document.getElementById('parametres-tab').classList.toggle('active', tab === 'parametres');
            }
        </script>
    </div>
</div>
</body>
</html>
