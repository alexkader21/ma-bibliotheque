<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Ma bibliothèque</title>
    {{-- Bootstrap chargé depuis un CDN : pas d'installation, pas de npm --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    {{-- Barre de navigation sombre, repliée en « menu burger » sur petit écran --}}
    <nav class="navbar navbar-expand-lg bg-dark mb-4" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="/livres">Ma bibliothèque</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Afficher le menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                {{-- ms-auto pousse les liens à droite --}}
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/livres">Bibliothèque</a></li>
                    @auth
                        <li class="nav-item"><span class="nav-link active">Bonjour {{ Auth::user()->pseudo }}</span></li>
                        <li class="nav-item"><a class="nav-link" href="/logout">Déconnexion</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="/login">Connexion</a></li>
                        <li class="nav-item"><a class="nav-link" href="/register">Inscription</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="container">
        {{-- Message flash : présent uniquement juste après une redirection ->with('success', ...) --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>

    {{-- Le JavaScript de Bootstrap (nécessaire pour ouvrir le menu sur mobile) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
