<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="FutbolTrading" />
    <meta name="keywords" content="FutbolTrading" />
    <meta name="author" content="Marcela Londoño, Emanuel Patiño & Tomás Pineda" />

    <!-- Favicon -->
    <link rel="icon" href="{{ asset("favicon.ico") }}" type="image/x-icon" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>@yield("title", __('Layout.name'))</title>
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand text-white text-bold ms-4 align-middle" href="{{ route("home.index") }}">
                <img src="{{ asset("images/logo.png") }}" alt="" width="40" height="40"
                    class="d-inline-block align-text-center text-white me-2 fs-5">
                {{ __('Layout.name') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse align-middle" id="navbarSupportedContent">
                <ul class="navbar-nav mx-2 mb-2 mb-lg-0 fs-5 align-middle">
                    <li class="nav-item me-2">
                        <a class="nav-link active text-white" aria-current="page" href="{{ route('card.index') }}">{{ __('Layout.shop') }}</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link active text-white"
                            href="{{ route('tradeItem.index') }}">{{ __('Layout.marketplace') }}</a>
                    </li>
                    @auth
                    <li class="nav-item me-2">
                        <a class="nav-link active text-white" href="{{route('myaccount.orders')}}" >{{ __('Layout.your_orders') }}</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link active text-white"
                            href="{{ route('tradeItem.userTradeItem') }}">{{ __('Layout.your_items') }}</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link active text-white" 
                            href="{{route('wishlist.index')}}" >{{ __('Layout.wishlist') }}</a>
                    </li>
                    @endauth
                </ul>

                <ul class="navbar-nav mx-2 mb-2 mb-lg-0 fs-5 ms-auto">
                    <li class="d-flex ms-auto me-3">
                        @guest
                        <a class="nav-link active fs-5 text-white"
                            href="{{ route('login') }}">{{ __('Layout.login') }}</a>
                        @endguest
                    </li>

                    @auth
                    <li class="d-flex"><a class="nav-link active text-white fs-5" href={{ route("cart.index") }}>
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a></li>
                    <li class="d-flex ms-auto me-3">
                        <form id="logout" action="{{ route('logout') }}" method="POST">
                            <a role="button" class="nav-link active text-white fs-5"
                                onclick="document.getElementById('logout').submit();">
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </a>
                            @csrf
                        </form>
                    </li>
                    @endauth
                </ul>



            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid my-5">
        <div class="container-fluid">
            <div class="col-lg-8 mx-auto">@yield("content")</div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <small>
                &copy; {{ date("Y") }} {{ __('Layout.rights') }} -
                <a class="text-reset fw-bold text-decoration-none" target="_blank">
                    Marcela Londoño, Emanuel Patiño & Tomás Pineda
                </a>
            </small>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <!-- Custom JS -->
    <script src="{{ asset("/js/app.js") }}"></script>
</body>

</html>
