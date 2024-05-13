<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->
    <title>Khar-bi</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/css/css-library.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/css/owl-carousel.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css')}}">
</head>
<body>
    <header>

        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img width="100px" src="{{ asset('assets/images/logo.jpeg')}}"></a>
                <a href="{{ url('home') }}">Accueil</a>
                <a href="{{ route('moutons.liste') }}">Moutons</a>
                <a href="{{ url('contacts') }}">Contacts</a>
                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                <!-- <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"> -->
                 @if (Route::has('login'))
                <!-- <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10"> -->
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                <!-- </div> -->
                 @endif
                <!-- <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
            <!-- </div> -->
        </nav>
    </header>
    <div>
        @yield('content')
    </div>
    <footer class="site-footer bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3>À propos de nous</h3>
                    <h3>Découvrez Khar Bi, votre destination en ligne pour l'achat de moutons de qualité auprès d'éleveurs dévoués.</h3>
                </div>
                <div class="col-md-4">
                    <h3>Liens rapides</h3>
                    <ul class="footer-links">
                        <li><a href="{{ url('home') }}">Accueil</a></li>
                        <li><a href="{{ route('moutons.liste') }}">Moutons</a></li>
                        <li><a href="{{ url('contacts') }}">Contacts</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Contactez-nous</h3>
                    <h3>Adresse: 123 Rue de la Ferme, Ville</h3>
                    <h3>Email: contact@kharbi.com</h3>
                    <h3>Téléphone: +123 456 789</h3>
                </div>
            </div>
            <hr>
        </div>
        <div class="container text-center">
            <p>&copy; 2023 Khar Bi - Tous droits réservés</p>
        </div>
    </footer>
</body>
</html>
