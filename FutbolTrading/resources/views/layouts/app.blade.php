<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Online Store - A Laravel EAFIT App">
    <meta name="keywords" content="online store, e-commerce, Laravel, EAFIT">
    <meta name="author" content="Marcela Londoño, Emanuel Patiño & Tomás Pineda">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />

    <title>@yield('title', 'Online Store')</title>
</head>

<body>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home.index') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Online Store Logo" width="30" height="30" class="me-2">
                Online Store
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home.index') }}">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="masthead bg-primary text-white text-center py-5">
        <div class="container d-flex align-items-center flex-column">
            <h1 class="display-4 fw-bold">@yield('subtitle', 'A Laravel EAFIT App')</h1>
            <p class="lead">Welcome to the best online store for your needs!</p>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <div class="mb-3">
                <a href="#" class="text-white me-3"><i class="fab fa-facebook"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
            </div>
            <small>
                &copy; {{ date('Y') }} OWNERS - 
                <a class="text-reset fw-bold text-decoration-none" target="_blank">
                    Marcela Londoño, Emanuel Patiño & Tomás Pineda
                </a>
            </small>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <!-- Custom JS -->
    <script src="{{ asset('/js/app.js') }}"></script>
</body>

</html>