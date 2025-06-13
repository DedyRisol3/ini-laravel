<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QuickServe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .hero {
            background: url('/bg_food.png') center center/cover no-repeat;
            height: 100vh;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.5);
            background-blend-mode: darken;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg shadow-sm" style="background-color: orange;">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center text-white fw-bold" href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 40px; margin-right: 10px;">
                QuickServe
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    @auth
                        @if(Auth::user()->role === 'admin')
                            <li class="nav-item">
                                <a href="{{ route('admin.pesanan.index') }}" class="nav-link text-white">Daftar Pesanan</a>
                            </li>
                        @endif
                    @endauth
                    <li class="nav-item"><a href="{{ route('menu.index') }}" class="nav-link text-white">Menu</a></li>
                    <li class="nav-item"><a href="{{ route('about') }}" class="nav-link text-white">About</a></li>
                    <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link text-white">Contact</a></li>
                    <li class="nav-item"><a href="{{ route('cart.index') }}" class="btn btn-light ms-2">🛒 Keranjang</a></li>

                    @auth
                        <li class="nav-item dropdown ms-3">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li class="dropdown-item text-muted small">{{ Auth::user()->email }}</li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item ms-2">
                            @if (Request::is('login'))
                                <a href="{{ route('register') }}" class="btn btn-outline-light">Register</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                            @endif
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
        @stack('scripts')
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
