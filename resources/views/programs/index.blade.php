@extends('layouts.public')

@section('title', 'Program Pelatihan - Yayasan Pembaharuan Indonesia')

@section('content')
    <div class="container" style="padding: 60px 20px;">
        <div class="section-title">
            <h2>Program Pelatihan</h2>
            <p>Pilih program yang sesuai dengan minta dan bakat Anda</p>
        </div>

        <div style="margin-bottom: 40px; display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
            <a href="#" class="btn btn-primary">Semua</a>
            <a href="#" class="btn btn-outline">Teknologi</a>
            <a href="#" class="btn btn-outline">Bisnis</a>
            <a href="#" class="btn btn-outline">Bahasa</a>
        </div>

        <div class="feature-grid">
            @forelse($programs as $program)
                <div class="feature-card" style="text-align: left;">
                    <a href="{{ route('programs.show', $program->slug) }}" style="display: block;">
                        <div
                            style="height: 180px; background-color: #e5e7eb; border-radius: 8px; margin-bottom: 15px; display: flex; align-items: center; justify-content: center;">
                            @if($program->image)
                                <img src="{{ asset('storage/' . $program->image) }}" alt="{{ $program->title }}"
                                    style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                            @else
                                <span style="font-size: 3rem;">📚</span>
                            @endif
                        </div>
                    </a>
                    <div style="margin-bottom: 5px;">
                        <span
                            style="font-size: 0.75rem; background: var(--primary-color); color: #fff; padding: 2px 8px; border-radius: 4px; font-weight: 600;">{{ $program->category }}</span>
                    </div>
                    <h3 style="color: var(--text-color);"><a
                            href="{{ route('programs.show', $program->slug) }}">{{ $program->title }}</a></h3>
                    <p style="margin-bottom: 5px; font-size: 0.8rem; color: #6b7280;">{{ $program->duration }}</p>
                    <p style="margin-bottom: 15px; font-size: 0.9rem;">{{ \Str::limit($program->description, 100) }}</p>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                        <span style="font-weight: 700; color: var(--primary-color);">Rp
                            {{ number_format($program->price, 0, ',', '.') }}</span>
                        <a href="{{ route('programs.show', $program->slug) }}" class="btn btn-outline"
                            style="font-size: 0.9rem; padding: 8px 16px;">Detail</a>
                    </div>
                </div>
            @empty
                <p style="text-align: center; grid-column: 1 / -1;">Belum ada program pelatihan yang tersedia saat ini.</p>
            @endforelse
        </div>
    </div>
@endsection