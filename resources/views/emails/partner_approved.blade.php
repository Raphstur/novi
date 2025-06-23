<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compte Partenaire Approuvé</title>
</head>
<body>
    <h1>Félicitations {{ $user->nom }} !</h1>
    <p>Votre demande de compte partenaire a été approuvée.</p>
    <p>Vous pouvez maintenant vous connecter à votre espace partenaire :</p>
    <p><a href="{{ route('login') }}">Se connecter</a></p>
    <p>Cordialement,<br>L'équipe NoVi</p>
</body>
</html>