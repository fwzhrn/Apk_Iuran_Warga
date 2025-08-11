<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Iuran Warga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 12px;
        }
        .card-header {
            background-color: #56b6c2;
            color: white;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }
        .btn-login {
            background-color: #a3c4f3;
            color: #1a3e72;
            font-weight: 600;
            border-radius: 6px;
        }
        .form-control {
            border-radius: 6px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h4 class="mb-0">Login Iuran Warga</h4>
                </div>
                <div class="card-body text-dark">
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input
                                type="text"
                                id="username"
                                name="username"
                                class="form-control @error('username') is-invalid @enderror"
                                required
                                autofocus
                                value="{{ old('username') }}"
                            >
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                required
                            >
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-login w-100">Login</button>
                    </form>

                    <div class="mt-3 text-center">
                        <span>Belum punya akun?</span>
                        <a href="{{ route('register') }}">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
