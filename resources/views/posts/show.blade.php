@extends('layouts.public')

@section('title', $post->title . ' - Yayasan Pembaharuan Indonesia')

@section('content')
    <div class="container" style="padding: 60px 20px;">
        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 40px;">
            <article>
                <h1 style="font-size: 2.5rem; margin-bottom: 20px; color: var(--text-color);">{{ $post->title }}</h1>
                <div style="color: #6b7280; margin-bottom: 30px;">
                    Diterbitkan pada {{ $post->created_at->format('d F Y') }}
                </div>

                @if($post->image)
                    <div
                        style="margin-bottom: 30px; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                            style="width: 100%; height: auto;">
                    </div>
                @endif

                <div style="font-size: 1.1rem; line-height: 1.8; color: #374151;">
                    {!! nl2br(e($post->content)) !!}
                </div>

                <div style="margin-top: 50px; padding-top: 30px; border-top: 1px solid #e5e7eb;">
                    <a href="{{ route('news.index') }}" class="btn btn-outline">&larr; Kembali ke Berita</a>
                </div>
            </article>

            <aside>
                <div class="admin-card">
                    <h3>Berita Terbaru Lainnya</h3>
                    <div style="margin-top: 20px;">
                        @foreach($latestPosts as $lp)
                            <div style="margin-bottom: 20px; display: flex; gap: 15px;">
                                <div
                                    style="width: 60px; height: 60px; flex-shrink: 0; background: #e5e7eb; border-radius: 6px; overflow: hidden;">
                                    @if($lp->image)
                                        <img src="{{ asset('storage/' . $lp->image) }}"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    @else
                                        <div
                                            style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                                            📰</div>
                                    @endif
                                </div>
                                <div>
                                    <h4 style="font-size: 0.95rem; margin-bottom: 5px;">
                                        <a href="{{ route('news.show', $lp->slug) }}">{{ Str::limit($lp->title, 50) }}</a>
                                    </h4>
                                    <span
                                        style="font-size: 0.8rem; color: #6b7280;">{{ $lp->created_at->format('d M Y') }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>
    </div>
@endsection