@extends('layouts.public')

@section('title', 'Tentang LKP Abqary - Profil Lembaga & Tim Pengajar')

@section('styles')
    <style>
        .about-hero {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            padding: 100px 0 160px;
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .about-hero::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100px;
            background: var(--bg-color);
            clip-path: polygon(0 100%, 100% 100%, 100% 0);
        }

        .about-hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .about-hero p {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
        }

        .section-padding {
            padding: 80px 0;
        }

        .profile-card {
            background: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: row;
            margin-top: -80px;
            position: relative;
            z-index: 10;
        }

        @media (max-width: 768px) {
            .profile-card {
                flex-direction: column;
            }

            .about-hero h1 {
                font-size: 2.5rem;
            }
        }

        .profile-img {
            flex: 1;
            min-height: 400px;
            background: #f1f5f9 url('{{ asset('assets/images/logo/logolkp.jpg') }}') center/contain no-repeat;
        }

        .profile-content {
            flex: 1.2;
            padding: 60px;
        }

        .section-tag {
            color: var(--primary-color);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.9rem;
            margin-bottom: 10px;
            display: block;
        }

        .section-title-modern {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 30px;
            color: var(--text-color);
        }

        .visi-misi-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .vm-card {
            background: white;
            padding: 40px;
            border-radius: var(--border-radius);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
            transition: transform 0.3s ease;
            border-left: 5px solid var(--primary-color);
        }

        .vm-card:hover {
            transform: translateY(-5px);
        }

        .vm-card h3 {
            color: var(--primary-color);
            margin-bottom: 20px;
            font-size: 1.5rem;
        }

        .vm-card ul li {
            margin-bottom: 12px;
            position: relative;
            padding-left: 25px;
        }

        .vm-card ul li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: var(--primary-color);
            font-weight: 700;
        }

        .team-section {
            background: var(--soft-teal);
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .team-member {
            background: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .team-member:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }

        .team-img-wrapper {
            height: 280px;
            overflow: hidden;
            position: relative;
        }

        .team-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: scale 0.5s ease;
        }

        .team-member:hover .team-img-wrapper img {
            scale: 1.1;
        }

        .team-info {
            padding: 25px;
        }

        .team-info h4 {
            font-size: 1.25rem;
            margin-bottom: 5px;
            color: var(--text-color);
        }

        .team-info span {
            color: var(--primary-color);
            font-weight: 600;
            font-size: 0.9rem;
        }

        .tutor-section h2 {
            text-align: center;
            margin-bottom: 10px;
        }

        .tutor-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 40px;
        }

        .tutor-card {
            background: white;
            padding: 20px;
            border-radius: var(--border-radius);
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.02);
        }

        .tutor-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 0 auto 15px;
            object-fit: cover;
            border: 3px solid var(--soft-teal);
        }

        .stats-bar {
            background: var(--footer-bg);
            color: white;
            padding: 40px 0;
            text-align: center;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
        }

        .stat-item h2 {
            color: var(--accent-color);
            font-size: 2.5rem;
            margin-bottom: 5px;
        }
    </style>
@endsection

@section('content')
    <section class="about-hero">
        <div class="container">
            <h1>Tentang LKP Abqary</h1>
            <p>Mitra terpercaya Anda dalam mengembangkan potensi diri dan keterampilan profesional untuk bersaing di era global.</p>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <div class="profile-card">
                <div class="profile-content">
                    <span class="section-tag">Profil Lembaga</span>
                    <h2 class="section-title-modern">Mewujudkan SDM Unggul & Kompeten</h2>
                    <p style="text-align: justify;">LKP ABQARY Indonesia adalah lembaga kursus dan pelatihan profesional di bawah naungan Yayasan Generasi Pembaharuan Indonesia. Kami hadir sebagai solusi bagi masyarakat yang ingin meningkatkan kompetensi melalui pendidikan vokasi berkualitas di tiga bidang utama:</p>
                    <br>
                    <p>1. Bidang Komputer, dengan program pelatihan teknologi Informasi untuk mendukung kompetensi digital.
                    </p>
                    <p>2. Bidang Bahasa, melalui kursus bahasa asing dan bahasa Indonesia guna menunjang komunikasi global.
                    </p>
                    <p>3. Bidang Baca Tulis Al-Qur'an, yang bertujuan membekali masyarakat dengan kemampuan dasar membaca,
                        menulis, dan memahami Al-Qur'an.</p>
                    <br>
                    <p style="text-align: justify;"> Dengan dukungan tenaga pengajar yang kompeten, LKP Abqary Indonesia
                        berkomitmen mencetak peserta
                        didik yang cerdas, terampil, dan berkarakter Islami.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding" style="background: white;">
        <div class="container">
            <div style="text-align: center; max-width: 800px; margin: 0 auto 60px;">
                <span class="section-tag">Visi & Misi</span>
                <h2 class="section-title-modern">Komitmen Kami Untuk Masa Depan</h2>
                <p>Kami memiliki visi yang jelas dan misi yang terukur untuk memastikan setiap lulusan kami memiliki daya saing tinggi.</p>
            </div>

            <div class="visi-misi-grid">
                <div class="vm-card">
                    <h3>Visi</h3>
                    <p>Menjadi lembaga kursus dan pelatihan yang unggul dalam bidang komputer, bahasa, dan baca tulis
                        Al-Qur'an untuk mencetak generasi berilmu, terampil, dan berakhlak mulia.
                    </p>
                </div>
                <div class="vm-card">
                    <h3>Misi</h3>
                    <ul>
                        <li>Menyelenggarakan pelatihan komputer yang aplikatif sesuai perkembangan teknologi.</li>
                        <li>Memberikan pembelajaran bahasa yang efektif untuk mendukung komunikasi global.</li>
                        <li>Membina keterampilan baca tulis Al-Qur'an dengan metode yang mudah dan menyenangkan.</li>
                        <li>Membangun karakter Islami serta semangat belajar sepanjang hayat.</li>
                        <li>Menjadi mitra masyarakat dalam meningkatkan kualitas pendidikan, sosial, dan keagamaan.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Bar -->
    <section class="stats-bar">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <h2>10+</h2>
                    <p>Tahun Pengalaman</p>
                </div>
                <div class="stat-item">
                    <h2>25+</h2>
                    <p>Alumni Terampil</p>
                </div>
                <div class="stat-item">
                    <h2>10+</h2>
                    <p>Program Unggulan</p>
                </div>
                <div class="stat-item">
                    <h2>10+</h2>
                    <p>Mitra Pengajar</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding team-section">
        <div class="container">
            <div style="text-align: center; max-width: 800px; margin: 0 auto 60px;">
                <span class="section-tag">Struktur Organisasi</span>
                <h2 class="section-title-modern">Pimpinan Kami</h2>
                <p>Di balik keberhasilan kami, terdapat tim kepemimpinan yang berdedikasi tinggi dan berpengalaman luas di
                    bidangnya.</p>
            </div>

            <div class="team-grid">
                <!-- Pembina -->
                <div class="team-member">
                    <div class="team-img-wrapper">
                        <img src="{{ asset('assets/images/team/pengawasyayasan.jpeg') }}" alt="Pengawas Yayasan">
                    </div>
                    <div class="team-info">
                        <h4>H. Sohib Pahlupi, M.Kom</h4>
                        <span>Pengawas Yayasan</span>
                    </div>
                </div>

                <!-- Ketua Yayasan -->
                <div class="team-member">
                    <div class="team-img-wrapper">
                        <img src="{{ asset('assets/images/team/pembinayayasan.jpeg') }}" alt="Pembina Yayasan">
                    </div>
                    <div class="team-info">
                        <h4>H. Heru Hermawan, S.Pd, M.Pd</h4>
                        <span>Pembina Yayasan</span>
                    </div>
                </div>

                <!-- Ketua LKP -->
                <div class="team-member">
                    <div class="team-img-wrapper">
                        <img src="{{ asset('assets/images/team/ketuayayasan.jpeg') }}" alt="Ketua Yayasan">
                    </div>
                    <div class="team-info">
                        <h4>Topik Hidayat</h4>
                        <span>Ketua Yayasan</span>
                    </div>
                </div>

                <!-- Pengawas -->
                <div class="team-member">
                    <div class="team-img-wrapper">
                        <img src="{{ asset('assets/images/team/ketualkp.jpeg') }}" alt="Ketua LKP">
                    </div>
                    <div class="team-info">
                        <h4>Supriyo, S.E</h4>
                        <span>Ketua LKP</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding" style="background: white;">
        <div class="container">
            <div style="text-align: center; max-width: 800px; margin: 0 auto 50px;">
                <span class="section-tag">Instruktur Ahli</span>
                <h2 class="section-title-modern">8 Tutor Profesional</h2>
                <p>Instruktur kami adalah praktisi industri yang siap membimbing Anda hingga mahir.</p>
            </div>

            <div class="tutor-grid">
                @php
                    $tutors = [
                        ['name' => 'Abdullah, S.Kom', 'role' => 'Tutor Officer', 'img' => asset('assets/images/team/tutor1.jpeg')],
                        ['name' => 'Firda Aulia Putri, S.Pd', 'role' => 'Graphic Design', 'img' => asset('assets/images/team/tutor2.jpeg')],
                        ['name' => 'Tasya Khaerunisa, S.Pd', 'role' => 'Digital Marketing', 'img' => asset('assets/images/team/tutor3.jpeg')],
                        ['name' => 'Wardah Hafizah, S.Pd', 'role' => 'Accounting', 'img' => asset('assets/images/team/tutor4.jpeg')],
                        ['name' => 'Arif Saputra', 'role' => 'Tutor Officer', 'img' => asset('assets/images/team/tutor5.jpeg')],
                        ['name' => 'Ahmed Muhyidin', 'role' => 'Tutor BTQ', 'img' => asset('assets/images/team/tutor6.jpeg')],
                        ['name' => 'Aulia Ramadina Putri', 'role' => 'Tutor BTQ', 'img' => asset('assets/images/team/tutor7.jpeg')],
                        ['name' => 'Ahmad', 'role' => 'English for Biz', 'img' => asset('assets/images/team/tutor8.jpeg')],
                        ['name' => 'Nurkholipah', 'role' => 'Tutor Calistung', 'img' => asset('assets/images/team/tutor9.jpeg')],
                        ['name' => 'Irwan abdillah', 'role' => 'Tutor Program Komputer', 'img' => asset('assets/images/team/tutor10.jpeg')],
                    ];
                @endphp

                @foreach($tutors as $tutor)
                    <div class="tutor-card">
                        <img src="{{ $tutor['img'] }}" alt="{{ $tutor['name'] }}" class="tutor-img">
                        <h5 style="font-size: 1.1rem; margin-bottom: 5px;">{{ $tutor['name'] }}</h5>
                        <p style="color: var(--primary-color); font-size: 0.85rem; font-weight: 600;">{{ $tutor['role'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection