<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('styles/client.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/navclient.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>E-varotra</title>
    <style>
        /* Ajuster la hauteur du header et ajouter un espace pour le contenu */
        header {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background-color: #fff; /* Assurez-vous que le fond est opaque */
        }
        
        main {
            margin-top: 80px; /* Ajustez cette valeur selon la hauteur de votre header */
            padding: 20px;
            position: relative;
            z-index: 1;
        }
        
        /* Style pour le dropdown du profil */
        .profile-dropdown {
            position: relative;
            cursor: pointer;
        }
        
        .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 10px;
            z-index: 1500; /* Valeur de z-index plus élevée que le contenu */
            min-width: 150px;
            border-radius: 4px;
        }
        
        .dropdown-menu a {
            display: block;
            padding: 8px 12px;
            text-decoration: none;
            color: #333;
        }
        
        .dropdown-menu a:hover {
            background-color: #f8f9fa;
        }
        
        .profile-dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>
<body>
    <!-- Header Start -->
    <header>
        <div class="container-fluid">
            <div class="navb-logo">
                E-varotra
            </div>
            <div class="navb-items">
                <div class="item">
                    <a href="{{ url('/produits/index')}}">Resume</a>
                </div>
                <div class="item">
                    <a href="">Vos commandes</a>
                </div>
                <div class="item">
                    <a href="{{ url('/produits/create')}}">Publication</a>
                </div>
                <div class="item profile-dropdown">
                    <div class="profile-icon">
                        <i class="fas fa-user-circle me-2"></i>
                        {{ Auth::user()->name }}
                    </div>
                    <div class="dropdown-menu">
                        <a href="#">Mon profil</a>
                        <form method="POST" action="{{ route('logout') }}" id="logout-form">
                            @csrf
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Déconnexion
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    
    <script>
        function logout() {
            document.getElementById('logout-form').submit();
        }
    </script>
</body>
</html>