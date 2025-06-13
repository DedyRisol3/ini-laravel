<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>QuickServe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<body>
    <nav class="navbar navbar-light bg-light shadow-sm px-3">
        <a class="navbar-brand fw-bold text-danger" href="{{ route('home') }}">QUICK SERVE</a>
        <div>
            <a class="nav-link d-inline" href="{{ route('home') }}">Home</a>
            <a class="nav-link d-inline" href="{{ route('menu.index') }}">Menu</a>
            <a class="nav-link d-inline" href="{{ route('about') }}">About</a>
            <a class="nav-link d-inline" href="{{ route('contact') }}">Contact</a>
            <a class="btn btn-sm btn-danger ms-2" href="{{ route('cart.index') }}">Cart</a>
        </div>
    </nav>

    <main class="container py-4">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
