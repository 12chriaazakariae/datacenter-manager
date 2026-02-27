<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Data Center Manager</title>
        <!-- CDN RemixIcon -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        <nav class="navbar">
            <a href="#" class="brand"><i class="ri-server-fill"></i> DC Manager</a>
            <ul>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"><i class="ri-dashboard-3-line"></i> Mon Tableau de Bord</a>
                    @else
                        <a href="{{ route('login') }}"><i class="ri-login-box-line"></i> Connexion</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"><i class="ri-user-add-line"></i> Inscription</a>
                        @endif
                    @endauth
                @endif
            </ul>
        </nav>

        <!-- Hero Section with circuit board background -->
        <section class="welcome-hero">
            <div class="welcome-hero-overlay"></div>
            <div class="welcome-hero-content">
                <h1>Bienvenue dans le Data Center</h1>
                <p>Gérez vos serveurs, switchs et ressources informatiques simplement.</p>
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary welcome-cta"><i class="ri-arrow-right-line"></i> Accéder à mon espace</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary welcome-cta"><i class="ri-login-circle-line"></i> Se connecter</a>
                @endauth
            </div>
        </section>

        <!-- Stats Section -->
        <section class="welcome-stats">
            <div class="welcome-stats-inner">
                <div class="stat-card">
                    <i class="ri-server-line stat-icon"></i>
                    <div class="stat-info">
                        <span class="stat-label">Serveurs</span>
                        <span class="stat-value">{{ \App\Models\Resource::whereHas('category', function($q) { $q->where('name', 'Serveurs'); })->count() }}</span>
                    </div>
                </div>
                <div class="stat-card">
                    <i class="ri-git-branch-line stat-icon"></i>
                    <div class="stat-info">
                        <span class="stat-label">Switchs Actifs</span>
                        <span class="stat-value">{{ \App\Models\Resource::whereHas('category', function($q) { $q->where('name', 'Switchs Reseau'); })->count() }}</span>
                    </div>
                </div>
                <div class="stat-card">
                    <i class="ri-database-2-line stat-icon"></i>
                    <div class="stat-info">
                        <span class="stat-label">Ordinateurs Portables</span>
                        <span class="stat-value">{{\App\Models\Resource::whereHas('category', function($q) { $q->where('name', 'Ordinateurs Portables'); })->count()}}</span>
                    </div>
                </div>
                <div class="stat-card">
                    <i class="ri-user-line stat-icon"></i>
                    <div class="stat-info">
                        <span class="stat-label">Utilisateurs</span>
                        <span class="stat-value">{{\App\Models\User::count()-1}}+</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="welcome-features">
            <h2 class="welcome-features-title">Fonctionnalités Clés</h2>
            <div class="welcome-features-grid">
                <div class="feature-card">
                    <i class="ri-bar-chart-box-line feature-icon"></i>
                    <h3>Monitoring</h3>
                    <p>Surveillance du CPU et de RAM</p>
                </div>
                <div class="feature-card">
                    <i class="ri-checkbox-multiple-line feature-icon"></i>
                    <h3>Inventaire</h3>
                    <p>Gestion précise des racks de câbles</p>
                </div>
                <div class="feature-card">
                    <i class="ri-file-list-3-line feature-icon"></i>
                    <h3>Alertes</h3>
                    <p>Gestion précise des racks de câbles</p>
                </div>
                <div class="feature-card">
                    <i class="ri-notification-3-line feature-icon"></i>
                    <h3>Alertes</h3>
                    <p>Notifications en cas d'alerte</p>
                </div>
            </div>
        </section>

        <!-- Footer without copyright -->
        <footer class="welcome-footer">
            <span class="welcome-footer-status"><span class="status-dot"></span> All systems operational</span>
        </footer>
    </body>
</html>
