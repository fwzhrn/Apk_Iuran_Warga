<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Iuran Warga')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css" />
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f7fa;
            color: #333;
        }
        .navbar-iuran {
            background-color: #e3e8f0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            color: #3a4b68 !important;
            letter-spacing: 1px;
        }
        .nav-link {
            color: #556e8a !important;
            font-weight: 500;
            transition: color 0.3s ease;
            font-size: 1rem;
        }
        .nav-link:hover,
        .nav-link:focus {
            color: #2c3e50 !important;
            text-decoration: underline;
        }
        .nav-link.active {
            color: #1f2a38 !important;
            font-weight: 700;
            text-decoration: underline;
        }
        main.container {
            padding-top: 3rem;
            padding-bottom: 3rem;
            max-width: 900px;
        }
        main .content-card {
            background: #fff;
            border-radius: 12px;
            padding: 2.5rem 3rem;
            box-shadow: 0 6px 15px rgba(0,0,0,0.08);
        }
        footer {
            font-size: 0.9rem;
            background-color: #e3e8f0;
            color: #556e8a;
            padding: 1.5rem 0;
            margin-top: 4rem;
            text-align: center;
            border-top: 1px solid #cfd8e3;
        }
        footer a:hover {
            color: #2c3e50 !important;
        }
        /* Navbar toggler icon color */
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='%233a4b68' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-iuran shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="/">Iuran Warga</a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center mb-2 mb-sm-0">
                <li class="nav-item">
                    <a href="/home" class="nav-link {{ Request::is('home') ? 'active' : '' }}">Home</a>
                </li>
                @auth
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="navbarProfile"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            Halo, {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarProfile">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    <i class="fas fa-user me-2"></i> Profil
                                </a>
                            </li>
                            <li>
                                {{-- <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </button>
                                </form> --}}
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link {{ Request::is('login') ? 'active' : '' }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link {{ Request::is('register') ? 'active' : '' }}">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<main class="container">
    <div class="content-card">
        @yield('content')
    </div>
</main>

<footer>
    <div class="container">
        <p class="mb-0">© {{ date('Y') }} Iuran Warga. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
