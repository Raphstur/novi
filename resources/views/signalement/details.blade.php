<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Signalement</title>
    <link rel="stylesheet" href="https://cdn.tailwindcss.com">
</head>
<body class="bg-gray-50 font-sans antialiased">
    <div class="container mx-auto py-12">
        <h1 class="text-2xl font-bold text-center mb-6">Détails du Signalement</h1>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <p><strong>Description :</strong> {{ $signalement->description }}</p>
            <p><strong>Date de Création :</strong> {{ $signalement->date_creation }}</p>
            <p><strong>Statut :</strong> {{ $signalement->statut }}</p>
            <p><strong>Niveau d'Urgence :</strong> {{ $signalement->niveau_urgence }}</p>
            <p><strong>Code de Suivi :</strong> {{ $signalement->tracking_code }}</p>
        </div>
        <div class="flex justify-center mt-6">
            <a href="{{ route('home') }}" class="bg-primary text-white px-4 py-2 rounded-md shadow-md hover:bg-primary-dark">Retour à l'Accueil</a>
        </div>
    </div>
</body>
</html>