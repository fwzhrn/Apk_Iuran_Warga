<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <style>
        body {
            background-color: #f9f9f9;
            font-family: 'Segoe UI', sans-serif;
        }
        .sidebar {
            min-width: 220px;
            max-width: 220px;
            min-height: 100vh;
            background: linear-gradient(to bottom, #4e54c8, #8f94fb);
            color: #fff;
            display: flex;
            flex-direction: column;
        }
        .sidebar .sidebar-header {
            font-size: 1.5rem;
            font-weight: 700;
            padding: 1.5rem 1rem;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            text-align: center;
        }
        .sidebar .nav-link {
            color: #fff;
            border-radius: 6px;
            padding: 0.75rem 1rem;
            font-weight: 500;
            transition: background-color 0.3s, color 0.3s;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.15);
            color: #d1d8e0;
            text-decoration: underline;
        }
        .logout-btn {
            background-color: #dc3545;
            color: #fff;
            border-radius: 6px;
            font-weight: 600;
            padding: 0.5rem 0;
            border: none;
            transition: background-color 0.3s;
        }
        .logout-btn:hover {
            background-color: #bb2d3b;
            color: #fff;
        }
        main {
            padding: 2rem;
        }
    </style>
</head>
<body>
<div class="d-flex">
    <nav class="sidebar">
        <div class="sidebar-header">
            Admin Panel
        </div>
        <ul class="nav flex-column flex-grow-1 p-3 gap-2">
            <li class="nav-item">
                <a href="/administrator/dashboard" class="nav-link">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Data Warga</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Laporan</a>
            </li>
        </ul>
        <form method="POST" action="/logout" class="p-3 mt-auto">
            @csrf
            <button type="submit" class="btn logout-btn w-100">Logout</button>
        </form>
    </nav>
    <main class="flex-grow-1">
        @yield('content')
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
