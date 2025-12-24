@extends('layouts.public')

@section('title', 'Galeri Kegiatan - LKP Abqary Indonesia')

@section('styles')
    <style>
        .gallery-hero {
            background: linear-gradient(135deg, #0d9488 0%, #0f172a 100%);
            padding: 80px 0;
            color: white;
            text-align: center;
            margin-bottom: 60px;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 80px;
        }

        .gallery-item {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            height: 350px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
            padding: 25px;
            color: white;
            transform: translateY(20px);
            opacity: 0;
            transition: all 0.4s ease;
        }

        .gallery-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(13, 148, 136, 0.2);
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-item:hover .gallery-overlay {
            transform: translateY(0);
            opacity: 1;
        }

        .gallery-tag {
            position: absolute;
            top: 20px;
            left: 20px;
            background: var(--primary-color);
            color: white;
            padding: 5px 15px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700;
            z-index: 10;
            backdrop-filter: blur(5px);
        }

        .filter-bar {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 10px 25px;
            border-radius: 50px;
            border: 2px solid #e2e8f0;
            background: white;
            color: #64748b;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-btn.active,
        .filter-btn:hover {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }

        /* Lightbox Styles */
        .lightbox {
            display: none;
            position: fixed;
            z-index: 9999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            backdrop-filter: blur(10px);
            justify-content: center;
            align-items: center;
            padding: 20px;
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .lightbox.active {
            display: flex;
            opacity: 1;
        }

        .lightbox-content {
            max-width: 90%;
            max-height: 85vh;
            border-radius: 12px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            transform: scale(0.9);
            transition: transform 0.3s ease;
            object-fit: contain;
        }

        .lightbox.active .lightbox-content {
            transform: scale(1);
        }

        .lightbox-close {
            position: absolute;
            top: 30px;
            right: 30px;
            color: white;
            background: rgba(255, 255, 255, 0.1);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .lightbox-close:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: rotate(90deg);
        }

        .lightbox-info {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            text-align: center;
            width: 100%;
            padding: 0 20px;
        }

        .lightbox-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 5px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        }

        .lightbox-desc {
            font-size: 1rem;
            opacity: 0.8;
            max-width: 600px;
            margin: 0 auto;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
        }
    </style>
@endsection
@section('content')
    <div class="gallery-hero">
        <div class="container">
            <h1 style="font-size: 3rem; font-weight: 800; margin-bottom: 15px;">Galeri Kegiatan</h1>
            <p style="font-size: 1.25rem; opacity: 0.9;">Momen Berharga dalam Perjalanan Belajar di LKP Abqary Indonesia</p>
        </div>
    </div>

    <div class="container">
        <div class="filter-bar">
            <button class="filter-btn active" onclick="filterGallery('all', this)">Semua</button>
            <button class="filter-btn" onclick="filterGallery('Pelatihan', this)">Pelatihan</button>
            <button class="filter-btn" onclick="filterGallery('Uji Kompetensi', this)">Uji Kompetensi</button>
            <button class="filter-btn" onclick="filterGallery('Wisuda', this)">Wisuda</button>
            <button class="filter-btn" onclick="filterGallery('Kunjungan Industri', this)">Kunjungan Industri</button>
        </div>

        <div class="gallery-grid" id="galleryGrid">
            @forelse($galleries as $gallery)
                <div class="gallery-item" data-category="{{ $gallery->category }}"
                    onclick="openLightbox('{{ asset('storage/' . $gallery->image) }}', '{{ $gallery->title }}', '{{ addslashes($gallery->description) }}')">
                    @if($gallery->category)
                        <span class="gallery-tag">{{ $gallery->category }}</span>
                    @endif
                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}">
                    <div class="gallery-overlay">
                        <h4 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 5px;">{{ $gallery->title }}</h4>
                        @if($gallery->description)
                            <p style="font-size: 0.85rem; opacity: 0.8;">{{ $gallery->description }}</p>
                        @endif
                    </div>
                </div>
            @empty
                <div style="grid-column: 1/-1; text-align: center; padding: 60px 0;">
                    <p style="font-size: 1.2rem; color: #64748b;">Belum ada foto kegiatan.</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Lightbox Modal -->
    <div class="lightbox" id="lightbox" onclick="closeLightbox()">
        <div class="lightbox-close">&times;</div>
        <img src="" alt="" class="lightbox-content" id="lightboxImg" onclick="event.stopPropagation()">
        <div class="lightbox-info">
            <h3 class="lightbox-title" id="lightboxTitle"></h3>
            <p class="lightbox-desc" id="lightboxDesc"></p>
        </div>
    </div>

    <script>
        function openLightbox(imgSrc, title, desc) {
            const lightbox = document.getElementById('lightbox');
            const lightboxImg = document.getElementById('lightboxImg');
            const lightboxTitle = document.getElementById('lightboxTitle');
            const lightboxDesc = document.getElementById('lightboxDesc');

            lightboxImg.src = imgSrc;
            lightboxTitle.innerText = title;
            lightboxDesc.innerText = desc || '';

            lightbox.style.display = 'flex';
            setTimeout(() => {
                lightbox.classList.add('active');
            }, 10);
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            const lightbox = document.getElementById('lightbox');
            lightbox.classList.remove('active');
            setTimeout(() => {
                lightbox.style.display = 'none';
            }, 300);
            document.body.style.overflow = 'auto';
        }

        function filterGallery(category, btn) {
            // Update active button
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            // Filter items
            const items = document.querySelectorAll('.gallery-item');
            items.forEach(item => {
                const itemCategory = item.getAttribute('data-category');
                if (category === 'all' || itemCategory === category) {
                    item.style.display = 'block';
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'scale(1)';
                    }, 10);
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.8)';
                    setTimeout(() => {
                        item.style.display = 'none';
                    }, 300);
                }
            });
        }
    </script>
@endsection