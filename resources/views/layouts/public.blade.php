<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LKP Abqary - Pusat Pendidikan Vokasi Siap Kerja')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #0d9488;
            /* Teal - friendly and professional */
            --secondary-color: #0f766e;
            --accent-color: #f59e0b;
            --text-color: #1e293b;
            --bg-color: #f8fafc;
            --white: #ffffff;
            --footer-bg: #0f172a;
            --font-main: 'Outfit', sans-serif;
            --soft-teal: #f0fdfa;
            --soft-blue: #eff6ff;
            --border-radius: 16px;
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
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        ul {
            list-style: none;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        header {
            background-color: var(--white);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo img {
            height: 40px;
        }

        .nav-links {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .nav-links a {
            font-weight: 600;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: var(--primary-color);
        }

        .btn {
            display: inline-block;
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: var(--white);
            border: 2px solid var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            transform: translateY(-2px);
        }

        .btn-outline {
            background-color: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            margin-left: 10px;
        }

        .btn-outline:hover {
            background-color: var(--primary-color);
            color: var(--white);
        }

        /* Dropdown */
        .dropdown {
            position: relative;
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            background-color: var(--white);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            min-width: 200px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all 0.3s ease;
        }

        .dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-menu li a {
            display: block;
            padding: 10px 20px;
            border-bottom: 1px solid #f3f4f6;
        }

        .dropdown-menu li:last-child a {
            border-bottom: none;
        }

        /* Footer */
        footer {
            background-color: var(--footer-bg);
            color: var(--white);
            padding: 60px 0 20px;
            margin-top: 60px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-col h3 {
            margin-bottom: 20px;
            font-size: 1.2rem;
            color: var(--primary-color);
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #d1d5db;
        }

        .footer-links a:hover {
            color: var(--white);
        }

        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #374151;
            color: #9ca3af;
            font-size: 0.9rem;
        }

        /* Mobile Menu trigger (hidden by default on desktop) */
        .menu-toggle {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 80px;
                left: 0;
                width: 100%;
                background: var(--white);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                padding: 20px;
                gap: 15px;
            }

            .nav-links.active {
                display: flex;
            }

            .dropdown-menu {
                position: static;
                box-shadow: none;
                padding-left: 20px;
                display: none;
                opacity: 1;
                visibility: visible;
                transform: translateY(0);
            }
            
            .dropdown.active .dropdown-menu {
                display: block;
            }

            .menu-toggle {
                display: block;
            }
            
            .action-area {
                display: none; /* Hide buttons on mobile for simplicity, or move them into nav-links */
            }
        }

        /* Floating WA */
        .wa-float {
            position: fixed;
            bottom: 40px;
            right: 40px;
            background-color: #25d366;
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            box-shadow: 2px 5px 15px rgba(0, 0, 0, 0.2);
            z-index: 9999;
            transition: all 0.3s ease;
        }

        .wa-float:hover {
            transform: scale(1.1);
            background-color: #128c7e;
            color: white;
        }

        .wa-tooltip {
            position: absolute;
            right: 75px;
            background: #1e293b;
            color: white;
            padding: 8px 15px;
            border-radius: 8px;
            font-size: 0.85rem;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            font-weight: 600;
        }

        .wa-float:hover .wa-tooltip {
            opacity: 1;
            visibility: visible;
            right: 80px;
        }
    </style>
    @yield('styles')
</head>

<!-- Top Bar / News Ticker -->
<div
    style="background: var(--footer-bg); color: #fff; padding: 10px 0; font-size: 0.85rem; border-bottom: 2px solid var(--accent-color);">
    <div class="container" style="display: flex; align-items: center; gap: 20px;">
        <span
            style="background: var(--accent-color); color: var(--footer-bg); padding: 2px 8px; border-radius: 4px; font-weight: 700; text-transform: uppercase; font-size: 0.75rem;">Terbaru</span>
        <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();"
            style="cursor: pointer;">
            Selamat Datang di Sistem Penerimaan Murid LKP Abqary! Pendaftaran Gelombang 1 telah dibuka sampai 31 Januari
            2026.
            Hubungi admin untuk bantuan teknis.
        </marquee>
    </div>
</div>

<!-- Header -->
<header>
    <div class="container navbar">
        <a href="{{ url('/') }}" class="logo" style="text-transform: uppercase; letter-spacing: 1px;">
            <span style="color: var(--primary-color)">LKP</span> ABQARY
        </a>
        <nav>
            <ul class="nav-links">
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li class="dropdown">
                    <a href="{{ url('/programs') }}">Program Pelatihan ▾</a>
                    <ul class="dropdown-menu"
                        style="border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.1); padding: 15px; min-width: 280px;">
                        <li style="margin-bottom: 15px;">
                            <strong
                                style="color: var(--primary-color); display: block; margin-bottom: 8px; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.5px;">A.
                                Kursus Komputer</strong>
                            <div style="padding-left: 10px; display: flex; flex-direction: column; gap: 5px;">
                                <a href="{{ route('programs.show', 'program-office') }}"
                                    style="font-size: 0.85rem; padding: 0; color: #475569;">- Program Office (Word,
                                    Excel, PP)</a>
                                <a href="{{ route('programs.show', 'mengetik-10-jari') }}"
                                    style="font-size: 0.85rem; padding: 0; color: #475569;">- Program Mengetik 10
                                    Jari</a>
                                <a href="{{ route('programs.show', 'desain-grafis') }}"
                                    style="font-size: 0.85rem; padding: 0; color: #475569;">- Program Desain Grafis</a>
                            </div>
                        </li>
                        <li style="margin-bottom: 15px;">
                            <strong
                                style="color: var(--primary-color); display: block; margin-bottom: 8px; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.5px;">B.
                                Kursus Bahasa</strong>
                            <div style="padding-left: 10px; display: flex; flex-direction: column; gap: 5px;">
                                <a href="{{ route('programs.show', 'bahasa-inggris') }}"
                                    style="font-size: 0.85rem; padding: 0; color: #475569;">- Bahasa Inggris</a>
                                <a href="{{ route('programs.show', 'bahasa-arab') }}"
                                    style="font-size: 0.85rem; padding: 0; color: #475569;">- Bahasa Arab</a>
                                <a href="{{ route('programs.show', 'bahasa-jepang') }}"
                                    style="font-size: 0.85rem; padding: 0; color: #475569;">- Bahasa Jepang</a>
                            </div>
                        </li>
                        <li style="margin-bottom: 15px;">
                            <a href="{{ route('programs.show', 'baca-tulis-alquran') }}" style="padding: 0;">
                                <strong
                                    style="color: var(--primary-color); display: block; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.5px;">C.
                                    Bimbingan Al-quran</strong>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('programs.show', 'calistung') }}" style="padding: 0;">
                                <strong
                                    style="color: var(--primary-color); display: block; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.5px;">D.
                                    Bimbingan Calistung</strong>
                            </a>
                        </li>
                    </ul>
                </li>
                <li><a href="{{ route('news.index') }}">Berita</a></li>
                <li><a href="{{ route('gallery') }}">Galeri</a></li>
                <li><a href="{{ url('/about') }}">Tentang Kami</a></li>
                <li><a href="{{ url('/contact') }}">Kontak</a></li>
            </ul>
        </nav>
        <div class="action-area" style="display: flex; gap: 12px; align-items: center;">
            <a href="{{ url('/login') }}" class="btn" style="color: var(--text-color); font-weight: 700;">Masuk</a>
            <a href="{{ url('/register') }}" class="btn btn-primary"
                style="border-radius: 50px; padding: 12px 28px;">Daftar Sekarang</a>
        </div>
        <div class="menu-toggle">☰</div>
    </div>
</header>

<!-- Main Content -->
<main>
    @yield('content')
</main>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="footer-grid">
            <div class="footer-col">
                <h3>LKP Abqary Indonesia</h3>
                <p>Mencetak generasi muda yang kompeten, berkarakter, dan siap kerja melalui pelatihan vokasi
                    berkualitas berbasis industri.</p>
                <br>
                <p>📍 Jl. H. Mawi Desa Waru Jaya (Depan SMAN 1 Parung) Kec. Parung, Kab. Bogor</p>
                <p>📞 +62 857-1925-5031</p>
            </div>
            <div class="footer-col" id="footer-programs">
                <h3>Program Populer</h3>
                <ul class="footer-links">
                    <li><a href="{{ route('programs.show', 'program-office') }}">Program Office</a></li>
                    <li><a href="{{ route('programs.show', 'desain-grafis') }}">Desain Grafis</a></li>
                    <li><a href="{{ route('programs.show', 'bahasa-inggris') }}">Bahasa Inggris</a></li>
                    <li><a href="{{ route('programs.show', 'calistung') }}">Bimbingan Calistung</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h3>Bantuan</h3>
                <ul class="footer-links">
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Syarat & Ketentuan</a></li>
                    <li><a href="#">Kebijakan Privasi</a></li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            &copy; {{ date('Y') }} Yayasan Pembaharuan Indonesia. All rights reserved.
        </div>
    </div>
</footer>

<a href="https://wa.me/6285719255031?text=Halo%20Admin%20LKP%20Abqary%20Indonesia%2C%20saya%20ingin%20bertanya%20mengenai%20program%20dan%20pendaftaran."
    class="wa-float" target="_blank">
    <span class="wa-tooltip">Butuh Bantuan? Chat Admin 💬</span>
    <svg width="35" height="35" viewBox="0 0 24 24" fill="currentColor">
        <path
            d="M12.031 6.172c-2.32 0-4.218 1.902-4.218 4.218 0 1.13.447 2.145 1.171 2.895l-.658 2.404c-.05.18.1.35.28.31l2.496-.54c.29.09.59.14.9.14a4.22 4.22 0 0 0 4.218-4.218c0-2.316-1.902-4.218-4.218-4.218z"
            opacity=".2" />
        <path
            d="M19.057 4.93a9.935 9.935 0 0 0-14.114 0c-3.5 3.5-3.8 8.8-1 12.6l-1.04 3.8a.75.75 0 0 0 .93.93l3.8-1.04c3.8 2.8 9.1 2.5 12.6-1a9.935 9.935 0 0 0 0-14.114zM12.031 18.21c-1.15 0-2.18-.32-3.07-.88l-.22-.13-2.28.62.62-2.28-.15-.24c-.62-.97-.94-2.1-.94-3.27 0-3.41 2.77-6.18 6.18-6.18s6.18 2.77 6.18 6.18-2.77 6.18-6.18 6.18z" />
        <path
            d="M15.221 13.56c-.19-.1-.1.1-.1.1-.53-.25-.97-.68-1.22-1.22 0 0 .2-.09.1-.28-.05-.1-.4-.98-.55-1.34-.15-.35-.29-.3-.43-.3-.12 0-.27-.02-.42-.02-.15 0-.4.06-.61.28-.21.22-.8.78-.8 1.9s.82 2.2 1.01 2.37c.19.17 1.6 2.45 3.9 3.44.55.24.97.38 1.31.49.56.17 1.06.14 1.46.08.45-.07 1.34-.55 1.54-1.08.2-.53.2-1.01.12-1.08-.11-.07-.3-.15-.49-.24z" />
    </svg>
</a>

    <script>
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            document.querySelector('.nav-links').classList.toggle('active');
        });

        // Optional: Dropdown toggle on mobile
        const dropdowns = document.querySelectorAll('.dropdown');
        dropdowns.forEach(dropdown => {
            dropdown.addEventListener('click', function() {
                if (window.innerWidth <= 768) {
                    this.classList.toggle('active');
                }
            });
        });
    </script>
</body>

</html>