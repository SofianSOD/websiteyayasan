@extends('layouts.public')

@section('title', 'Yayasan Pembaharuan Indonesia - Masa Depan Cerah')

@section('styles')
    <style>
        /* Hero Slider Section */
        .hero {
            position: relative;
            height: 650px;
            overflow: hidden;
            border-bottom-left-radius: 80px;
            margin-bottom: 60px;
            color: var(--white);
        }

        .slider-container {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            visibility: hidden;
            transition: opacity 1.2s ease, filter 1.2s ease;
            filter: blur(10px);
            display: flex;
            align-items: center;
        }

        .slide.active {
            opacity: 1;
            visibility: visible;
            filter: blur(0);
        }

        .slide-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            z-index: -1;
        }

        .slide-bg::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(13, 148, 136, 0.4), rgba(0, 0, 0, 0.5));
        }

        .hero-content {
            z-index: 10;
        }

        .hero-text h1 {
            font-size: 4rem;
            line-height: 1.1;
            margin-bottom: 24px;
            font-weight: 800;
            max-width: 800px;
            transform: translateY(30px);
            opacity: 0;
            transition: all 0.8s ease 0.4s;
        }

        .hero-text p {
            font-size: 1.4rem;
            margin-bottom: 40px;
            max-width: 600px;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease 0.6s;
        }

        .hero-btns {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease 0.8s;
        }

        .slide.active .hero-text h1,
        .slide.active .hero-text p,
        .slide.active .hero-btns {
            opacity: 1;
            transform: translateY(0);
        }

        /* Slider Indicators */
        .slider-dots {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 12px;
            z-index: 20;
        }

        .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .dot.active {
            background: var(--white);
            width: 30px;
            border-radius: 10px;
        }

        /* Features Section */
        .features {
            padding: 40px 0 100px;
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-header h2 {
            font-size: 2.75rem;
            color: var(--text-color);
            margin-bottom: 16px;
            font-weight: 700;
        }

        .section-header p {
            color: #64748b;
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
        }

        .card {
            background: var(--white);
            border-radius: var(--border-radius);
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border: 1px solid #f1f5f9;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(13, 148, 136, 0.1);
        }

        .card-icon {
            width: 70px;
            height: 70px;
            background: var(--soft-teal);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin-bottom: 24px;
            color: var(--primary-color);
        }

        /* Programs Section */
        .programs {
            background-color: var(--soft-blue);
            padding: 100px 0;
            border-radius: 80px 0 80px 0;
        }

        /* News Section */
        .news {
            padding: 100px 0;
        }

        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }

        .news-card {
            background: var(--white);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .news-img {
            height: 220px;
            background-color: #e2e8f0;
            background-size: cover;
            background-position: center;
        }

        .news-content {
            padding: 24px;
        }

        .news-content h3 {
            margin-bottom: 12px;
            font-size: 1.25rem;
            line-height: 1.4;
        }

        .btn-large {
            padding: 16px 36px;
            font-size: 1.1rem;
            border-radius: 50px;
        }
    </style>
@endsection

@section('content')
    <!-- Hero Slider -->
    <section class="hero">
        <div class="slider-container">
            @forelse($sliders as $index => $slider)
                <div class="slide {{ $index === 0 ? 'active' : '' }}">
                    <div class="slide-bg" style="background-image: url('{{ asset('storage/' . $slider->image) }}')"></div>
                    <div class="container hero-content">
                        <div class="hero-text">
                            <h1>{{ $slider->headline }}</h1>
                            <p>{{ $slider->sub_headline }}</p>
                            <div class="hero-btns">
                                <a href="{{ url('/register') }}" class="btn btn-primary btn-large">Daftar Sekarang</a>
                                <a href="{{ url('/programs') }}" class="btn btn-outline btn-large"
                                    style="border-color: #fff; color: #fff; background: rgba(255,255,255,0.1);">Cek Program</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Fallback Slide 1 -->
                <div class="slide active">
                    <div class="slide-bg" style="background-image: url('{{ asset('images/slider/slide3.jpeg') }}')"></div>
                    <div class="container hero-content">
                        <div class="hero-text">
                            <h1>Raih Masa Depan Gemilang Bersama LKP Abqary</h1>
                            <p>Lembaga kursus & pelatihan vokasi terpercaya dengan kurikulum berbasis industri. Siapkan dirimu
                                menjadi profesional yang dicari perusahaan.</p>
                            <div class="hero-btns">
                                <a href="{{ url('/register') }}" class="btn btn-primary btn-large">Daftar Sekarang</a>
                                <a href="{{ url('/programs') }}" class="btn btn-outline btn-large"
                                    style="border-color: #fff; color: #fff; background: rgba(255,255,255,0.1);">Cek Program</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fallback Slide 2 -->
                <div class="slide">
                    <div class="slide-bg" style="background-image: url('{{ asset('images/slider/slide4.jpg') }}')"></div>
                    <div class="container hero-content">
                        <div class="hero-text">
                            <h1>Belajar Langsung dari Ahlinya</h1>
                            <h1>Belajar Langsung dari Ahlinya</h1>
                            <p>Dibimbing langsung oleh instruktur praktisi yang berpengalaman. Praktik 80%, Teori 20% untuk
                                hasil maksimal.</p>
                            <div class="hero-btns">
                                <a href="{{ url('/register') }}" class="btn btn-primary btn-large">Mulai Belajar</a>
                                <a href="{{ url('/about') }}" class="btn btn-outline btn-large"
                                    style="border-color: #fff; color: #fff; background: rgba(255,255,255,0.1);">Tentang Kami</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse

            <!-- Indicators -->
            <div class="slider-dots">
                @if(count($sliders) > 0)
                    @foreach($sliders as $index => $slider)
                        <div class="dot {{ $index === 0 ? 'active' : '' }}" onclick="jumpToSlide({{ $index }})"></div>
                    @endforeach
                @else
                    <div class="dot active" onclick="jumpToSlide(0)"></div>
                    <div class="dot" onclick="jumpToSlide(1)"></div>
                @endif
            </div>
        </div>
    </section>

    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.dot');
        const totalSlides = slides.length;

        function showSlide(index) {
            slides.forEach(slide => slide.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));

            slides[index].classList.add('active');
            dots[index].classList.add('active');
            currentSlide = index;
        }

        function nextSlide() {
            let next = (currentSlide + 1) % totalSlides;
            showSlide(next);
        }

        function jumpToSlide(index) {
            showSlide(index);
            resetTimer();
        }

        let slideInterval = setInterval(nextSlide, 5000);

        function resetTimer() {
            clearInterval(slideInterval);
            slideInterval = setInterval(nextSlide, 5000);
        }
    </script>

    <!-- Excellence -->
    <section class="features">
        <div class="container">
            <div class="section-header">
                <h2>Kenapa Memilih LKP Abqary?</h2>
                <p>Kami memberikan lebih dari sekadar sertifikat. Kami memberikan kompetensi nyata.</p>
            </div>
            <div class="feature-grid">
                <div class="card">
                    <div class="card-icon">📚</div>
                    <h3>Kurikulum Terupdate</h3>
                    <p>Materi pembelajaran disusun menyesuaikan standar kebutuhan industri terkini agar skill Anda selalu
                        relevan.</p>
                </div>
                <div class="card">
                    <div class="card-icon">👨‍🏫</div>
                    <h3>Instruktur Praktisi</h3>
                    <p>Belajar langsung dari mereka yang telah berpengalaman bertahun-tahun di bidangnya masing-masing.</p>
                </div>
                <div class="card">
                    <div class="card-icon">🚀</div>
                    <h3>Bimbingan Karir</h3>
                    <p>Kami tidak hanya mengajar, tapi juga membimbing Anda mempersiapkan diri memasuki dunia kerja
                        profesional.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Programs -->
    @if(count($programs) > 0)
        <section class="programs">
            <div class="container">
                <div class="section-header">
                    <h2>Program Pilihan</h2>
                    <p>Berbagai pilihan program pelatihan untuk mengasah skill Anda.</p>
                </div>
                <div class="feature-grid">
                    @foreach($programs as $program)
                        <div class="card" style="padding: 0; overflow: hidden;">
                            <div
                                style="height: 200px; background-image: url('{{ $program->image ? asset('storage/' . $program->image) : 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80' }}'); background-size: cover; background-position: center;">
                            </div>
                            <div style="padding: 24px;">
                                <span
                                    style="background: var(--soft-teal); color: var(--primary-color); padding: 4px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: 700;">{{ $program->duration }}</span>
                                <h3 style="margin: 15px 0 10px;">{{ $program->title }}</h3>
                                <p style="color: #64748b; font-size: 0.95rem; margin-bottom: 20px;">
                                    {{ Str::limit($program->description, 100) }}
                                </p>
                                <a href="{{ url('/programs') }}"
                                    style="color: var(--primary-color); font-weight: 700; display: flex; align-items: center; gap: 8px;">Pelajari
                                    Selengkapnya →</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div style="text-align: center; margin-top: 50px;">
                    <a href="{{ url('/programs') }}" class="btn btn-outline">Lihat Semua Program</a>
                </div>
            </div>
        </section>
    @endif

    <!-- Latest News -->
    @if(count($posts) > 0)
        <section class="news">
            <div class="container">
                <div class="section-header">
                    <h2>Berita & Artikel Terbaru</h2>
                    <p>Ikuti perkembangan terbaru dan tips seputar dunia vokasi.</p>
                </div>
                <div class="news-grid">
                    @foreach($posts as $post)
                        <div class="news-card">
                            <div class="news-img"
                                style="background-image: url('{{ $post->image ? asset('storage/' . $post->image) : 'https://images.unsplash.com/photo-1499750310107-5fef28a66643?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80' }}')">
                            </div>
                            <div class="news-content">
                                <small style="color: #94a3b8;">{{ $post->created_at->format('d M Y') }}</small>
                                <h3 style="margin-top: 8px;">{{ $post->title }}</h3>
                                <p style="color: #64748b; font-size: 0.95rem; margin-bottom: 15px;">
                                    {{ Str::limit(strip_tags($post->content), 80) }}
                                </p>
                                <a href="{{ route('news.show', $post->slug) }}"
                                    style="color: var(--primary-color); font-weight: 600;">Baca Detail</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section
        style="background: var(--primary-color); color: #fff; padding: 80px 0; text-align: center; border-radius: 0 80px 0 80px;">
        <div class="container">
            <div class="container">
                <h2 style="font-size: 2.5rem; margin-bottom: 20px;">Jangan Tunda Kesuksesanmu!</h2>
                <p style="font-size: 1.2rem; margin-bottom: 40px; opacity: 0.9;">Kesempatan terbaik tidak datang dua kali.
                    Daftar Gelombang 1 sekarang dan amankan kursimu.</p>
                <a href="{{ url('/register') }}" class="btn btn-primary"
                    style="background: #fff; color: var(--primary-color); border: none; padding: 18px 40px; font-size: 1.2rem; border-radius: 50px;">Daftar
                    Sekarang</a>
            </div>
    </section>
@endsection