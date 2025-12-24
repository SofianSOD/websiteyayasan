<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - Yayasan Pembaharuan Indonesia')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --accent-color: #f59e0b;
            --text-color: #1f2937;
            --bg-color: #f3f4f6;
            --white: #ffffff;
            --sidebar-bg: #0f172a;
            --font-main: 'Inter', sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-main);
            color: var(--text-color);
            background-color: var(--bg-color);
        }

        .admin-container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 280px;
            background: var(--sidebar-bg);
            color: #fff;
            padding: 25px;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            box-shadow: 4px 0 10px rgba(0,0,0,0.05);
        }

        .sidebar-brand {
            padding: 20px 0 30px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
        }

        .sidebar-brand h3 {
            color: var(--white);
            font-size: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 800;
        }

        .sidebar-brand span {
            color: var(--primary-color);
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            flex-grow: 1;
        }

        .sidebar-menu li {
            margin-bottom: 8px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: #9ca3af;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 0.95rem;
            text-decoration: none;
        }

        .sidebar-menu a:hover {
            background: rgba(255, 255, 255, 0.05);
            color: var(--white);
            padding-left: 25px; /* Subtle slide effect */
        }

        .sidebar-menu a.active {
            background: var(--primary-color);
            color: var(--white);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        .sidebar-footer {
            margin-top: auto;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
        }

        .btn-logout {
            width: 100%;
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #ef4444;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
            text-align: center;
            display: block;
        }

        .btn-logout:hover {
            background: #ef4444;
            color: white;
            border-color: #ef4444;
        }

        .main-admin {
            flex: 1;
            margin-left: 260px;
            padding: 40px;
            min-height: 100vh;

            @media (max-width: 768px) {
                .sidebar {
                    transform: translateX(-100%);
                    transition: transform 0.3s ease;
                    z-index: 50;
                    width: 260px;
                }

                .sidebar.active {
                    transform: translateX(0);
                }

                .main-admin {
                    margin-left: 0;
                    padding: 20px;
                }

                .sidebar-toggle {
                    display: block !important;
                }
            }

            .sidebar-toggle {
                display: none;
                font-size: 1.5rem;
                cursor: pointer;
                margin-right: 15px;
            }

            .admin-card {
                background: #fff;
                border-radius: 12px;
                padding: 25px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
                margin-bottom: 25px;
            }

            .btn {
                display: inline-block;
                padding: 10px 20px;
                border-radius: 8px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s;
                text-align: center;
                border: none;
            }

            .btn-primary {
                background: var(--primary-color);
                color: #fff;
            }

            .btn-primary:hover {
                background: var(--secondary-color);
            }

            .btn-outline {
                background: transparent;
                border: 1px solid #d1d5db;
                color: var(--text-color);
            }

            .btn-outline:hover {
                background: #f9fafb;
            }

            .table {
                width: 100%;
                border-collapse: collapse;
            }

            .table th,
            .table td {
                padding: 15px;
                text-align: left;
                border-bottom: 1px solid #f3f4f6;
            }

            .table th {
                background: #f9fafb;
                font-weight: 600;
                color: #6b7280;
                font-size: 0.85rem;
                text-transform: uppercase;
            }

            .status-badge {
                padding: 4px 10px;
                border-radius: 20px;
                font-size: 0.75rem;
                font-weight: 700;
            }

            .status-pending {
                background: #fef3c7;
                color: #92400e;
            }

            .status-approved {
                background: #dcfce7;
                color: #166534;
            }

            .status-rejected {
                background: #fee2e2;
                color: #991b1b;
            }

            a {
                text-decoration: none;
                color: inherit;
            }
    </style>
    @yield('styles')
</head>

<body>
    <div class="admin-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-brand">
                <h3><span>YPI</span> ADMIN</h3>
            </div>
            
            <ul class="sidebar-menu">
                <li><a href="{{ route('admin.dashboard') }}"
                        class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a></li>
                <li><a href="{{ route('admin.admissions.index') }}"
                        class="{{ request()->routeIs('admin.admissions.*') ? 'active' : '' }}">Manajemen Peserta</a>
                </li>
                <li><a href="{{ route('admin.posts.index') }}"
                        class="{{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">Manajemen Berita</a></li>
                <li><a href="{{ route('admin.programs.index') }}"
                        class="{{ request()->routeIs('admin.programs.*') ? 'active' : '' }}">Katalog Program</a></li>
                <li><a href="{{ route('admin.galleries.index') }}"
                        class="{{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">Galeri Kegiatan</a></li>
                <li><a href="{{ route('admin.sliders.index') }}"
                        class="{{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">Manajemen Slider</a></li>
                <li><a href="{{ route('admin.reports.index') }}"
                        class="{{ request()->routeIs('admin.reports.*') ? 'active' : '' }}">Laporan</a></li>
                <li><a href="{{ route('admin.settings.index') }}"
                        class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">Pengaturan</a></li>
                <li><a href="{{ route('home') }}">Lihat Website</a></li>
            </ul>

            <div class="sidebar-footer">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-logout">
                        Keluar
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-admin">
            <header style="margin-bottom: 30px; display: flex; justify-content: space-between; align-items: center;">
                <div style="display: flex; align-items: center;">
                    <div class="sidebar-toggle" onclick="toggleSidebar()">☰</div>
                    <h1 style="font-size: 1.5rem; color: #111827;">@yield('admin_title', 'Admin Panel')</h1>
                </div>
                <div style="display: flex; align-items: center; gap: 15px;">
                    <span style="font-weight: 600;">{{ Auth::user()->name }}</span>
                    <div
                        style="width: 40px; height: 40px; background: var(--primary-color); color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700;">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </div>
            </header>

            @yield('admin_content')
        </div>
    </div>
    </div>

    <script>
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('active');
        }
    </script>
</body>

</html>