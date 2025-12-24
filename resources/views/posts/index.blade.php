@extends('layouts.public')

@section('title', 'Berita & Artikel - Yayasan Pembaharuan Indonesia')

@section('content')
    <div class="container" style="padding: 60px 20px;">
        <div class="section-title">
            <h2>Berita & Artikel Terbaru</h2>
            <p>Tetap terinformasi dengan kabar terkini dari YPI</p>
        </div>

        <div class="feature-grid">
            @forelse($posts as $post)
                <div class="feature-card" style="text-align: left;">
                    <div
                        style="height: 200px; background-color: #e5e7eb; border-radius: 8px; margin-bottom: 20px; overflow: hidden;">
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <div
                                style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; font-size: 4rem;">
                                📰</div>
                        @endif
                    </div>
                    <div style="color: #6b7280; font-size: 0.85rem; margin-bottom: 10px;">
                        {{ $post->created_at->format('d M Y') }}</div>
                    <h3 style="color: var(--text-color); margin-bottom: 15px;">{{ $post->title }}</h3>
                    <p style="margin-bottom: 20px; font-size: 0.95rem;">{{ Str::limit($post->content, 120) }}</p>
                    <a href="{{ route('news.show', $post->slug) }}"
                        style="color: var(--primary-color); font-weight: 600;">Selengkapnya &rarr;</a>
                </div>
            @empty
                <p style="text-align: center; grid-column: 1 / -1;">Belum ada berita yang diterbitkan.</p>
            @endforelse
        </div>

        <div style="margin-top: 40px; display: flex; justify-content: center;">
            {{ $posts->links() }}
        </div>
    </div>
@endsection