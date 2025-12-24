@extends('layouts.portal')

@section('title', 'Pengumuman - YPI Portal')
@section('page_title', 'Pengumuman & Berita Terbaru')

@section('content')
    <div class="card" style="margin-bottom: 30px; background: #3b82f6; color: white;">
        <h3 style="margin-bottom: 5px;">Pusat Informasi Siswa</h3>
        <p style="opacity: 0.9;">Dapatkan update terbaru mengenai jadwal seleksi, pengumuman kelulusan, dan berita kegiatan
            yayasan di sini.</p>
    </div>

    <div style="display: grid; gap: 25px;">
        @forelse($posts as $post)
            <div class="card" style="padding: 0; overflow: hidden; display: flex; flex-direction: row; align-items: stretch;">
                @if($post->image)
                    <div style="width: 250px; min-width: 250px;">
                        <img src="{{ asset('storage/' . $post->image) }}" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                @endif
                <div style="padding: 25px; flex-grow: 1;">
                    <div
                        style="font-size: 0.8rem; color: var(--text-muted); margin-bottom: 10px; font-weight: 700; text-transform: uppercase;">
                        📅 {{ $post->created_at->format('d M Y') }}
                    </div>
                    <h3 style="margin-bottom: 15px; font-size: 1.4rem;">{{ $post->title }}</h3>
                    <p style="color: var(--text-muted); line-height: 1.7; margin-bottom: 20px;">
                        {{ Str::limit(strip_tags($post->content), 200) }}
                    </p>
                    <a href="{{ route('news.show', $post->slug) }}" class="btn btn-outline"
                        style="font-size: 0.85rem; padding: 8px 20px;">Baca Selengkapnya</a>
                </div>
            </div>
        @empty
            <div class="card" style="text-align: center; padding: 50px;">
                <p style="color: var(--text-muted);">Belum ada pengumuman untuk saat ini.</p>
            </div>
        @endforelse
    </div>
@endsection