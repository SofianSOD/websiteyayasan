@extends('layouts.portal')

@section('title', 'Katalog Program - YPI Portal')
@section('page_title', 'Katalog Program Pelatihan')

@section('styles')
    <style>
        .program-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
        }

        .program-item {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .program-img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 15px;
        }

        .program-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            font-size: 0.85rem;
            color: var(--text-muted);
            font-weight: 600;
        }

        .price-tag {
            color: var(--primary);
            font-size: 1.1rem;
            font-weight: 800;
        }
    </style>
@endsection

@section('content')
    <div class="card" style="margin-bottom: 30px; background: var(--primary); color: white;">
        <h3 style="margin-bottom: 10px;">Temukan Masa Depan Anda</h3>
        <p style="opacity: 0.9;">Pilih dari berbagai program pelatihan vokasi berkualitas yang kami tawarkan. Gunakan tombol
            daftar untuk memulai proses pendaftaran langsung.</p>
    </div>

    <div class="program-grid">
        @foreach($programs as $program)
            <div class="card program-item">
                @if($program->image)
                    <img src="{{ asset('storage/' . $program->image) }}" class="program-img" alt="{{ $program->title }}">
                @else
                    <div class="program-img"
                        style="background: #f1f5f9; display: flex; align-items: center; justify-content: center; font-size: 3rem;">
                        📚</div>
                @endif

                <h3 style="margin-bottom: 10px; font-size: 1.25rem;">{{ $program->title }}</h3>
                <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.6; margin-bottom: 20px; flex-grow: 1;">
                    {{ Str::limit($program->description, 120) }}
                </p>

                <div class="program-meta">
                    <span>⏱ {{ $program->duration }}</span>
                    <span class="price-tag">Rp {{ number_format($program->price, 0, ',', '.') }}</span>
                </div>

                <div style="display: flex; gap: 10px;">
                    <a href="{{ route('admission.register', ['program' => $program->id]) }}" class="btn btn-primary"
                        style="flex: 1; padding: 10px; font-size: 0.9rem;">Daftar Sekarang</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection