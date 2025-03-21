
    <style>
        /* Styles globaux */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        
        /* Styles pour la navbar */
        .admin-navbar {
            background-color: #343a40;
            height: 60px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            color: white;
            font-weight: bold;
            font-size: 20px;
        }
        
        /* Styles pour la sidebar */
        .admin-sidebar {
            background-color: #212529;
            color: #fff;
            width: 250px;
            position: fixed;
            top: 60px;
            bottom: 0;
            left: 0;
            padding: 20px 0;
            overflow-y: auto;
        }
        
        .sidebar-title {
            font-size: 18px;
            font-weight: 600;
            padding: 0 20px 15px 20px;
            border-bottom: 1px solid #495057;
        }
        
        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .sidebar-menu-header {
            text-transform: uppercase;
            font-size: 12px;
            color: #6c757d;
            padding: 15px 20px 5px 20px;
            font-weight: 600;
        }
        
        .sidebar-menu-item {
            padding: 12px 20px;
            display: block;
            color: #ced4da;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .sidebar-menu-item:hover {
            background-color: #495057;
            color: white;
        }
        
        .sidebar-menu-item.active {
            background-color: #495057;
            color: white;
        }
        
        .sidebar-menu-item i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        
        /* Styles pour le contenu principal */
        .admin-content {
            margin-left: 250px;
            margin-top: 60px;
            padding: 20px;
        }
        
        .content-wrapper {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            padding: 20px;
            margin-bottom: 20px;
        }
        
        /* Styles pour les cartes */
        .stats-card {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        
        .stats-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }
        
        .stats-icon.blue {
            background-color: rgba(13, 110, 253, 0.1);
            color: #0d6efd;
        }
        
        .stats-icon.green {
            background-color: rgba(25, 135, 84, 0.1);
            color: #198754;
        }
        
        .stats-icon.yellow {
            background-color: rgba(255, 193, 7, 0.1);
            color: #ffc107;
        }
        
        .stats-icon.purple {
            background-color: rgba(111, 66, 193, 0.1);
            color: #6f42c1;
        }
        
        .stats-info .title {
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 5px;
        }
        
        .stats-info .value {
            font-size: 24px;
            font-weight: 600;
            color: #212529;
        }

        /* Pour le mode sombre */
        .dark .admin-content,
        .dark .content-wrapper,
        .dark .stats-card {
            background-color: #2d3748;
            color: #e2e8f0;
        }
        
        .dark .stats-info .value {
            color: #e2e8f0;
        }
        
        .dark .stats-info .title {
            color: #a0aec0;
        }
    </style>

    <!-- Chargement local de Bootstrap (pas besoin de connexion internet) -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Chargement local de Font Awesome (pas besoin de connexion internet) -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    
    <!-- Navbar principale -->
    <nav class="admin-navbar">
        <div class="container-fluid d-flex justify-content-between align-items-center h-100">
            <!-- Logo et titre -->
            <a class="navbar-brand" href="#">AdminPanel</a>
            
            <!-- Menu de droite -->
            <div class="d-flex align-items-center">
                <!-- Notifications -->
                <a href="#" class="text-white mx-3">
                    <i class="fas fa-bell"></i>
                </a>
                
                <!-- Profil dropdown -->
                <div class="dropdown">
                    <a href="#" class="text-white d-flex align-items-center" role="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('images/avatar-placeholder.png') }}" alt="Avatar" class="rounded-circle" width="36" height="36">
                        <span class="ms-2">Admin</span>
                        <i class="fas fa-caret-down ms-2"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profil</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Paramètres</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-2"></i> Déconnexion</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="admin-sidebar">
        <div class="sidebar-title">Dashboard Admin</div>
        <nav>
            <ul class="sidebar-menu">
                <!-- Tableau de bord -->
                <li>
                    <a href="#" class="sidebar-menu-item active">
                        <i class="fas fa-th-large"></i> Dashboard
                    </a>
                </li>
                
                <!-- Gestion des Clients -->
                <li>
                    <div class="sidebar-menu-header">Gestion Clients</div>
                    <a href="#" class="sidebar-menu-item">
                        <i class="fas fa-users"></i> Liste des clients
                    </a>
                    <a href="#" class="sidebar-menu-item">
                        <i class="fas fa-user-plus"></i> Ajouter un client
                    </a>
                    <a href="#" class="sidebar-menu-item">
                        <i class="fas fa-clipboard-list"></i> Commandes clients
                    </a>
                </li>
                
                <!-- Gestion des Produits -->
                <li>
                    <div class="sidebar-menu-header">Gestion Produits</div>
                    <a href="#" class="sidebar-menu-item">
                        <i class="fas fa-box"></i> Inventaire
                    </a>
                    <a href="#" class="sidebar-menu-item">
                        <i class="fas fa-plus-circle"></i> Ajouter un produit
                    </a>
                    <a href="#" class="sidebar-menu-item">
                        <i class="fas fa-tags"></i> Catégories
                    </a>
                </li>
                
                <!-- Paramètres -->
                <li>
                    <div class="sidebar-menu-header">Paramètres</div>
                    <a href="#" class="sidebar-menu-item">
                        <i class="fas fa-cog"></i> Configuration
                    </a>
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
                <h1 class="h3 mb-2">Tableau de bord</h1>
                <p>Bienvenue dans votre espace d'administration</p>
            </div>
            
            <!-- Widgets statistiques -->
            <div class="row mb-4">
                <!-- Widget Clients -->
                <div class="col-md-3">
                    <div class="stats-card">
                        <div class="stats-icon blue">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stats-info">
                            <div class="title">Clients</div>
                            <div class="value">128</div>
                        </div>
                    </div>
                </div>
                
                <!-- Widget Produits -->
                <div class="col-md-3">
                    <div class="stats-card">
                        <div class="stats-icon green">
                            <i class="fas fa-box"></i>
                        </div>
                        <div class="stats-info">
                            <div class="title">Produits</div>
                            <div class="value">64</div>
                        </div>
                    </div>
                </div>
                
                <!-- Widget Commandes -->
                <div class="col-md-3">
                    <div class="stats-card">
                        <div class="stats-icon yellow">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="stats-info">
                            <div class="title">Commandes</div>
                            <div class="value">24</div>
                        </div>
                    </div>
                </div>
                
                <!-- Widget Revenus -->
                <div class="col-md-3">
                    <div class="stats-card">
                        <div class="stats-icon purple">
                            <i class="fas fa-euro-sign"></i>
                        </div>
                        <div class="stats-info">
                            <div class="title">Revenus</div>
                            <div class="value">8 560 €</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contenu principal -->
            <div class="content-wrapper">
                <div class="p-4">
                    {{ __("Votre contenu principal ici") }}
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts locaux (pas besoin de connexion internet) -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
