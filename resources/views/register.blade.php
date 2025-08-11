<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register Iuran Warga</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
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
        .btn-custom {
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
                    <h4 class="mb-0">Register Iuran Warga</h4>
                </div>
                <div class="card-body text-dark">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required value="{{ old('username') }}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-custom w-100">Register</button>
                    </form>

                    <div class="mt-3 text-center">
                        <span>Sudah punya akun?</span>
                        <a href="{{ route('login') }}">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
