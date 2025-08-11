<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <style>
        body {
            background-color: #f5f7fa;
            font-family: 'Segoe UI', sans-serif;
            color: #33475b;
        }
        .sidebar {
            min-width: 220px;
            max-width: 220px;
            min-height: 100vh;
            background-color: #a3c4f3; /* biru pastel */
            color: #1a3e72; /* biru gelap */
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            padding-top: 1.5rem;
            box-shadow: 2px 0 8px rgba(0,0,0,0.05);
        }
        .sidebar .sidebar-header {
            font-size: 1.5rem;
            font-weight: 700;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid rgba(26, 62, 114, 0.2);
            text-align: center;
            color: #1a3e72;
        }
        .sidebar .nav-link {
            color: #1a3e72;
            border-radius: 8px;
            padding: 0.75rem 1.25rem;
            font-weight: 600;
            transition: background-color 0.3s, color 0.3s;
            margin-bottom: 0.3rem;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #56b6c2; /* teal soft */
            color: #fff;
            text-decoration: none;
            box-shadow: 0 2px 8px rgba(86,182,194,0.5);
        }
        .logout-btn {
            background-color: #f28c8c; /* soft red */
            color: #fff;
            border-radius: 8px;
            font-weight: 600;
            padding: 0.5rem 0;
            border: none;
            transition: background-color 0.3s;
        }
        .logout-btn:hover {
            background-color: #d56262;
            color: #fff;
        }
        main {
            padding: 2rem;
            background-color: #fff;
            min-height: 100vh;
            border-radius: 0 12px 12px 0;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            flex-grow: 1; /* agar main mengisi ruang tersisa */
            margin-left: 0; /* hapus margin kiri */
        }
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: auto;
                min-height: auto;
                flex-direction: row;
                padding: 0.5rem 1rem;
                box-shadow: 0 2px 8px rgba(0,0,0,0.1);
                z-index: 1030;
            }
            .sidebar .sidebar-header {
                flex: 1;
                font-size: 1.25rem;
                padding: 0.5rem 1rem;
                border-bottom: none;
                text-align: left;
                color: #1a3e72;
            }
            .sidebar .nav {
                flex-direction: row;
                gap: 1rem;
                padding: 0;
                margin-left: auto;
            }
            .sidebar .nav-link {
                padding: 0.5rem 0.75rem;
                white-space: nowrap;
                margin-bottom: 0;
            }
            main {
                margin-left: 0;
                padding: 1rem;
                border-radius: 0;
            }
            .logout-btn {
                padding: 0.3rem 0.75rem;
                font-size: 0.9rem;
                border-radius: 6px;
            }
        }
    </style>
</head>
<body>
<div class="d-flex">
    <nav class="sidebar">
        <div class="sidebar-header">
            Admin Panel
        </div>
        <ul class="nav flex-column flex-grow-1 px-3 gap-2">
            <li class="nav-item">
                <a href="/administrator/dashboard" class="nav-link {{ Request::is('administrator/dashboard') ? 'active' : '' }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="/administrator/data-warga" class="nav-link {{ Request::is('administrator/data-warga*') ? 'active' : '' }}">Data Warga</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.kategori-iuran') }}" class="nav-link {{ Request::is('administrator/kategori-iuran*') ? 'active' : '' }}">Kategori Iuran</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Laporan</a>
            </li>
        </ul>
        <form method="POST" action="/logout" class="px-3 mt-auto pb-3">
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
