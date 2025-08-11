<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login Admin Iuran Warga</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow" style="border-radius: 12px;">
                <div class="card-header text-center" style="background-color: #56b6c2; color: #fff; border-top-left-radius: 12px; border-top-right-radius: 12px;">
                    <h4 class="mb-0">Login Admin</h4>
                </div>
                <div class="card-body" style="color: #33475b;">
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form method="POST" action="{{ route('admin.login') }}">
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
                                style="border-radius: 6px;"
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
                                style="border-radius: 6px;"
                            >
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn" style="background-color: #a3c4f3; color: #1a3e72; font-weight: 600; width: 100%; border-radius: 6px;">
                            Login
                        </button>
                    </form>

                    <div class="mt-3 text-center">
                        <span>Belum punya akun?</span>
                        <a href="{{ route('admin.register') }}">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
