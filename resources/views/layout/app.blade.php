<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Khar-bi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        /* Ajout de styles CSS personnalisés */
        body {
            text-align: center; /* Centre le contenu de la page */
            background-color: #f4f4f4; /* Couleur de fond */
            font-family: Arial, sans-serif; /* Police de caractères */
        }

        h1 {
            color: #333; /* Couleur du titre */
            margin-top: 20px; /* Marge en haut du titre */
        }

        .container {
            background-color: #fff; /* Couleur de fond de la zone de contenu */
            padding: 20px; /* Espacement interne de la zone de contenu */
            border-radius: 10px; /* Coins arrondis pour la zone de contenu */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Ombre légère autour de la zone de contenu */
        }
    </style>
</head>
<body>
    <h1>Bienvenue dans Khar-bi</h1>
    <div class="container mt-5">
        @yield('content')
    </div>
</body>
</html>
