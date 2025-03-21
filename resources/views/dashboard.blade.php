@extends('layouts.app')


@section('content')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="styles/admin.css">
        <nav class="admin-navbar">
        <div class="container-fluid d-flex justify-content-between align-items-center h-100">
            <a class="navbar-brand" href="#">AdminPanel</a>
                        <div class="d-flex align-items-center">
                <a href="#" class="text-white mx-3">
                    <i class="fas fa-bell"></i>
                </a>
                
                <div class="dropdown">
                    <a href="#" class="text-white d-flex align-items-center" role="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('images/avatar-placeholder.png') }}" alt="Avatar" class="rounded-circle" width="36" height="36">
                        <span class="ms-2">Admin</span>
                        <i class="fas fa-caret-down ms-2"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-2"></i> Déconnexion</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="admin-sidebar">
        <div class="sidebar-title">Dashboard Admin</div>
        <nav>
            <ul class="sidebar-menu">
                <li>
                    <a href="#" class="sidebar-menu-item active">
                        <i class="fas fa-th-large"></i> Dashboard
                    </a>
                </li>
                
                <li>
                    <div class="sidebar-menu-header">Gestion Clients</div>
                    <a href="#" class="sidebar-menu-item">
                        <i class="fas fa-users"></i> Liste des clients
                    </a>
                    <a href="#" class="sidebar-menu-item">
                        <i class="fas fa-clipboard-list"></i> Commandes clients
                    </a>
                </li>
                
                <li>
                    <div class="sidebar-menu-header">Gestion Produits</div>

                    <a href="#" class="sidebar-menu-item">
                        <i class="fas fa-plus-circle"></i> Produits par defaut
                    </a>
                    <a href="#" class="sidebar-menu-item">
                        <i class="fas fa-tags"></i> Catégories
                    </a>
                </li>
                
                <li>
                    <div class="sidebar-menu-header">Paramètres</div>
                    <a href="#" class="sidebar-menu-item">
                        <i class="fas fa-sign-out-alt"></i> Déconnexion
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    
    <!-- Contenu principal -->
    <div class="admin-content">
        <div class="container-fluid">
            <div class="content-wrapper mb-4">
                <!-- <h1 class="h3 mb-2">Tableau de bord</h1> -->
                <p>Bienvenue dans votre espace d'administration</p>
            </div>
            
            
            <div class="content-wrapper">
                <div class="p-4">
                    {{ __("Ato ny atao ny afficharge antsoina") }}
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>


@endsection