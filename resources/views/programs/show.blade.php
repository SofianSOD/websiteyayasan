@extends('layouts.public')

@section('title', $program->title . ' - Yayasan Pembaharuan Indonesia')

@section('styles')
    <style>
        .program-hero {
            background: linear-gradient(135deg, #0f172a 0%, #0d9488 100%);
            padding: 100px 0 140px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .program-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://www.transparenttextures.com/patterns/cubes.png');
            opacity: 0.1;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            padding: 40px;
        }

        .benefit-item {
            background: white;
            padding: 24px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
            transition: transform 0.3s ease;
            border: 1px solid #f1f5f9;
        }

        .benefit-item:hover {
            transform: translateY(-5px);
            border-color: var(--primary-color);
        }

        .syllabus-step {
            position: relative;
            padding-left: 40px;
            margin-bottom: 30px;
        }

        .syllabus-step::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: -30px;
            width: 2px;
            background: #e2e8f0;
        }

        .syllabus-step:last-child::before {
            display: none;
        }

        .syllabus-dot {
            position: absolute;
            left: -5px;
            top: 0;
            width: 12px;
            height: 12px;
            background: var(--primary-color);
            border-radius: 50%;
            border: 3px solid white;
            box-shadow: 0 0 0 4px rgba(13, 148, 136, 0.1);
        }

        .floating-info {
            position: sticky;
            top: 100px;
        }
    </style>
@endsection

@section('content')
    <div class="program-hero">
        <div class="container">
            <div style="max-width: 800px; position: relative; z-index: 2;">
                <span
                    style="background: rgba(255,255,255,0.1); padding: 6px 16px; border-radius: 50px; font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 24px; display: inline-block;">
                    {{ $program->category }}
                </span>
                <h1 style="font-size: clamp(2.5rem, 5vw, 4rem); font-weight: 800; margin-bottom: 24px; line-height: 1.1;">
                    {{ $program->title }}
                </h1>
                <p style="font-size: 1.25rem; opacity: 0.9; line-height: 1.6; margin-bottom: 40px;">
                    {{ $program->description }}
                </p>
                <div style="display: flex; gap: 20px; flex-wrap: wrap;">
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <span style="font-size: 1.5rem;">⏱️</span>
                        <div>
                            <span style="display: block; font-size: 0.75rem; opacity: 0.7; font-weight: 600;">DURASI</span>
                            <span style="font-weight: 700;">{{ $program->duration }}</span>
                        </div>
                    </div>
                    <div style="width: 1px; background: rgba(255,255,255,0.1); height: 40px;"></div>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <span style="font-size: 1.5rem;">💎</span>
                        <div>
                            <span
                                style="display: block; font-size: 0.75rem; opacity: 0.7; font-weight: 600;">INVESTASI</span>
                            <span style="font-weight: 700;">Rp {{ number_format($program->price, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: -80px; position: relative; z-index: 10;">
        <div style="display: grid; grid-template-columns: 1fr 380px; gap: 40px;">
            <!-- Left Column: Content -->
            <div>
                <div class="glass-card"
                    style="background: white; color: var(--text-color); box-shadow: 0 20px 50px rgba(0,0,0,0.05);">
                    <h2
                        style="font-size: 1.75rem; font-weight: 800; margin-bottom: 24px; display: flex; align-items: center; gap: 12px;">
                        <span style="color: var(--primary-color);">📋</span> Deskripsi Program
                    </h2>
                    <div style="font-size: 1.1rem; line-height: 1.8; color: #475569;">
                        <p style="margin-bottom: 20px;">
                            Kursus <strong>{{ $program->title }}</strong> dirancang untuk membekali Anda dengan pengetahuan
                            teoritis dan keterampilan praktis yang komprehensif. Melalui kurikulum yang telah disesuaikan
                            dengan kebutuhan industri terkini, kami memastikan setiap lulusan memiliki kompetensi yang
                            nyata.
                        </p>

                        <h3 style="font-size: 1.4rem; font-weight: 700; color: var(--text-color); margin: 40px 0 24px;">
                            Silabus Pembelajaran</h3>
                        <div style="padding-left: 5px;">
                            <div class="syllabus-step">
                                <div class="syllabus-dot"></div>
                                <h4 style="font-weight: 700; margin-bottom: 5px;">Tahap 1: Pengenalan & Fondasi</h4>
                                <p style="font-size: 0.95rem;">Memahami konsep dasar, alat pendukung, dan ekosistem kerja
                                    profesional di bidang ini.</p>
                            </div>
                            <div class="syllabus-step">
                                <div class="syllabus-dot"></div>
                                <h4 style="font-weight: 700; margin-bottom: 5px;">Tahap 2: Teknik Menengah & Implementasi
                                </h4>
                                <p style="font-size: 0.95rem;">Menerapkan teknik-teknik kunci melalui studi kasus nyata dan
                                    latihan intensif.</p>
                            </div>
                            <div class="syllabus-step">
                                <div class="syllabus-dot"></div>
                                <h4 style="font-weight: 700; margin-bottom: 5px;">Tahap 3: Proyek Akhir & Portofolio</h4>
                                <p style="font-size: 0.95rem;">Mengerjakan proyek nyata yang bisa dijadikan portofolio saat
                                    melamar kerja.</p>
                            </div>
                        </div>

                        <h3 style="font-size: 1.4rem; font-weight: 700; color: var(--text-color); margin: 40px 0 24px;">
                            Hasil yang Diharapkan</h3>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                            <div class="benefit-item">
                                <span style="font-size: 1.5rem; display: block; margin-bottom: 10px;">🎯</span>
                                <span style="font-weight: 700; display: block; margin-bottom: 5px;">Skill Praktis</span>
                                <p style="font-size: 0.85rem; line-height: 1.5;">Mampu mengoperasikan tools dan teknik
                                    secara mandiri.</p>
                            </div>
                            <div class="benefit-item">
                                <span style="font-size: 1.5rem; display: block; margin-bottom: 10px;">📜</span>
                                <span style="font-weight: 700; display: block; margin-bottom: 5px;">Sertifikat Resmi</span>
                                <p style="font-size: 0.85rem; line-height: 1.5;">Pengakuan kompetensi dari yayasan
                                    terpercaya.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Sidebar -->
            <div class="floating-info">
                <div
                    style="background: white; border-radius: 24px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.05); border: 1px solid #f1f5f9;">
                    <div style="height: 200px; background: #e2e8f0;">
                        @if($program->image)
                            <img src="{{ asset('storage/' . $program->image) }}" alt="{{ $program->title }}"
                                style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <div
                                style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; font-size: 5rem; background: var(--soft-blue);">
                                🎓
                            </div>
                        @endif
                    </div>
                    <div style="padding: 30px;">
                        <div style="margin-bottom: 25px;">
                            <span
                                style="display: block; color: #64748b; font-size: 0.85rem; font-weight: 600; margin-bottom: 5px;">TOTAL
                                INVESTASI</span>
                            <span
                                style="display: block; color: var(--primary-color); font-size: 1.75rem; font-weight: 800;">Rp
                                {{ number_format($program->price, 0, ',', '.') }}</span>
                        </div>

                        <ul style="padding: 0; margin-bottom: 30px;">
                            <li
                                style="display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px dashed #e2e8f0; font-size: 0.95rem;">
                                <span style="color: #64748b;">Durasi</span>
                                <span style="font-weight: 700;">{{ $program->duration }}</span>
                            </li>
                            <li
                                style="display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px dashed #e2e8f0; font-size: 0.95rem;">
                                <span style="color: #64748b;">Akses Materi</span>
                                <span style="font-weight: 700;">Selamanya</span>
                            </li>
                            <li style="display: flex; justify-content: space-between; padding: 12px 0; font-size: 0.95rem;">
                                <span style="color: #64748b;">Sertifikat</span>
                                <span style="font-weight: 700;">Tersedia</span>
                            </li>
                        </ul>

                        <a href="{{ route('admission.register', ['program' => $program->id]) }}" class="btn btn-primary"
                            style="width: 100%; padding: 15px; border-radius: 12px; font-size: 1.1rem; box-shadow: 0 10px 20px rgba(13, 148, 136, 0.2);">
                            Daftar Program
                        </a>
                    </div>
                </div>

                <div style="margin-top: 30px; text-align: center;">
                    <p style="font-size: 0.9rem; color: #64748b;">Butuh bantuan pendaftaran?</p>
                    <a href="https://wa.me/6285719255031?text=Halo%20Admin%20LKP%20Abqary%20Indonesia%2C%20saya%20ingin%20bertanya%20mengenai%20program%20{{ urlencode($program->title) }}." target="_blank"
                        style="color: var(--primary-color); font-weight: 700; font-size: 0.9rem;">Chat Customer Service
                        💬</a>
                </div>
            </div>
        </div>
    </div>

    <div style="background: white; border-top: 1px solid #f1f5f9; padding: 80px 0; margin-top: 80px;">
        <div class="container">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center;">
                <div>
                    <h2 style="font-size: 2rem; font-weight: 800; margin-bottom: 20px;">Mulai Belajar Hari Ini</h2>
                    <p style="color: #64748b; font-size: 1.1rem; line-height: 1.6;">Yayasan Pembaharuan Indonesia telah
                        membantu ribuan alumni menemukan karir impian mereka. Kini giliran Anda.</p>
                </div>
                <div style="display: flex; justify-content: flex-end; gap: 20px;">
                    <a href="{{ url('/programs') }}" class="btn btn-outline"
                        style="padding: 15px 30px; border-radius: 50px;">Lihat Program Lain</a>
                    <a href="{{ url('/about') }}" class="btn btn-primary"
                        style="padding: 15px 30px; border-radius: 50px;">Tentang Yayasan</a>
                </div>
            </div>
        </div>
    </div>
@endsection