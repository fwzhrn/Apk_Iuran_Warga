<!-- filepath: d:\Laravel\iuran_warga\resources\views\layouts\app.blade.php -->
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
            background-color: #f9f9f9;
        }

        .navbar-iuran {
            background: linear-gradient(to right, #4e54c8, #8f94fb);
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: 1.2px;
            font-size: 24px;
            color: #fff !important;
        }

        .nav-link {
            color: #fff !important;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-link:hover,
        .nav-link:focus {
            color: #d1d8e0 !important;
            text-decoration: underline;
        }

        main.container {
            padding-top: 32px;
            padding-bottom: 32px;
        }

        main .content-card {
            background: #fff;
            border-radius: 8px;
            padding: 32px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        footer {
            font-size: 0.95rem;
            background: linear-gradient(to right, #4e54c8, #8f94fb);
            color: #fff;
        }

        footer h5 {
            font-weight: 600;
        }

        footer ul {
            padding-left: 0;
            list-style: none;
        }

        footer ul li {
            margin-bottom: 0.5rem;
        }

        footer a:hover {
            color: #d1d8e0 !important;
        }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-sm navbar-iuran shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">Iuran Warga</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center mb-2 mb-sm-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/home">Home</a>
                    </li>
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarProfile" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Halo, {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarProfile">
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        <i class="fas fa-user me-2"></i> Profil
                                    </a>
                                </li>
                                <li>
                                    {{-- <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button class="dropdown-item" type="submit">
                                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                                        </button>
                                    </form> --}}
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<footer class="mt-5 text-center">
    <div class="container py-3">
        <p class="mb-0">© {{ date('Y') }} Iuran Warga. All rights reserved.</p>
    </div>
</footer>
</html>