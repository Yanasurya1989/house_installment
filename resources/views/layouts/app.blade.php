<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Cicilan Rumah') }}</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            padding-top: 70px;
        }

        .wrapper {
            display: flex;
            min-height: calc(100vh - 70px);
        }

        .sidebar {
            width: 220px;
            background-color: #343a40;
            padding: 20px;
            color: white;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .sidebar a.active,
        .sidebar a:hover {
            background-color: #495057;
        }

        .main-content {
            flex-grow: 1;
            padding: 30px;
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    @if (!Route::is('login'))
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Cicilan Rumah') }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('house_installments.index') }}">Data Cicilan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @endif

    <!-- Main Layout -->
    @if (auth()->check() && !Route::is('login') && !Route::is('dashboard'))
        <div class="wrapper">
            <div class="sidebar">
                <h5>{{ auth()->user()->name }}</h5>
                <hr>
                <a href="{{ route('home') }}" class="{{ request()->is('/dashboard') ? 'active' : '' }}">🏠 Beranda</a>
                <a href="{{ route('house_installments.index') }}"
                    class="{{ request()->is('house_installments*') ? 'active' : '' }}">💰 Cicilan</a>
                <a href="{{ route('users.index') }}" class="{{ request()->is('users*') ? 'active' : '' }}">👥 Manajemen
                    User</a>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">🚪 Logout</a>

                <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;"></form>
            </div>

            <div class="main-content">
                @yield('content')
            </div>
        </div>
    @else
        <main class="container">
            @yield('content')
        </main>
    @endif

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
