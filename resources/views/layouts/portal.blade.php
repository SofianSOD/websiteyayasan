<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portal Siswa - YPI')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --secondary: #64748b;
            --accent: #f59e0b;
            --bg: #f8fafc;
            --card: #ffffff;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --font-main: 'Outfit', sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-main);
            background-color: var(--bg);
            color: var(--text-main);
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: #ffffff;
            border-right: 1px solid #e2e8f0;
            padding: 30px 20px;
            height: 100vh;
            position: fixed;
            display: flex;
            flex-direction: column;
            z-index: 100;
        }

        .sidebar-brand {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 40px;
            padding: 0 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-menu {
            list-style: none;
            flex-grow: 1;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 15px;
            text-decoration: none;
            color: var(--text-muted);
            font-weight: 600;
            border-radius: 12px;
            transition: all 0.3s;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: #eff6ff;
            color: var(--primary);
        }

        .sidebar-menu a.active {
            box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.1);
        }

        /* Main Content */
        .main {
            margin-left: 260px;
            flex-grow: 1;
            padding: 40px;
        }

        .top-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .user-pill {
            display: flex;
            align-items: center;
            gap: 12px;
            background: white;
            padding: 6px 15px 6px 6px;
            border-radius: 50px;
            border: 1px solid #e2e8f0;
        }

        .avatar {
            width: 35px;
            height: 35px;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        /* Components */
        .card {
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .btn {
            border-radius: 10px;
            padding: 12px 24px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
            display: inline-block;
            text-decoration: none;
            border: none;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            box-shadow: 0 4px 14px 0 rgba(37, 99, 235, 0.39);
        }

        .btn-outline {
            background: transparent;
            border: 2px solid #e2e8f0;
            color: var(--text-muted);
        }

        .badge {
            padding: 5px 12px;
            border-radius: 10px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
        }

        .badge-pending {
            background: #fefce8;
            color: #a16207;
        }

        .badge-approved {
            background: #f0fdf4;
            color: #166534;
        }

        .badge-danger {
            background: #fef2f2;
            color: #991b1b;
        }

        @media (max-width: 992px) {
            .sidebar {
                display: none;
            }

            .main {
                margin-left: 0;
                padding: 20px;
            }
        }
    </style>
    @yield('styles')
</head>

<body>
    <aside class="sidebar">
        <div class="sidebar-brand">
            <span style="font-size: 2rem;">🎓</span> PORTAL SISWA
        </div>
        <ul class="sidebar-menu">
            <li><a href="{{ route('student.dashboard') }}"
                    class="{{ request()->routeIs('student.dashboard') ? 'active' : '' }}">🏠 Beranda</a></li>
            <li><a href="{{ route('student.announcements') }}"
                    class="{{ request()->routeIs('student.announcements') ? 'active' : '' }}">🔔 Pengumuman</a></li>
            <li><a href="{{ route('student.programs') }}"
                    class="{{ request()->routeIs('student.programs') ? 'active' : '' }}">🔍 Katalog Program</a></li>
            <li><a href="{{ route('student.schedule') }}"
                    class="{{ request()->routeIs('student.schedule') ? 'active' : '' }}">📅 Jadwal Saya</a></li>
            <li><a href="{{ route('student.profile') }}"
                    class="{{ request()->routeIs('student.profile') ? 'active' : '' }}">👤 Profil Saya</a></li>
        </ul>
        <div style="margin-top: auto; border-top: 1px solid #f1f5f9; padding-top: 20px;">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    style="background:none; border:none; color:#ef4444; font-weight:700; cursor:pointer; width:100%; text-align:left; padding:10px 15px;">
                    👋 Keluar Akun
                </button>
            </form>
        </div>
    </aside>

    <main class="main">
        <nav class="top-nav">
            <h2 style="font-weight: 800; font-size: 1.5rem;">@yield('page_title', 'Dashboard')</h2>
            <div class="user-pill">
                <div class="avatar">{{ substr(Auth::user()->name, 0, 1) }}</div>
                <span style="font-weight: 600; font-size: 0.9rem;">{{ Auth::user()->name }}</span>
            </div>
        </nav>

        @yield('content')
    </main>
</body>

</html>