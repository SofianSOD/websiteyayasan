@extends('layouts.portal')

@section('title', 'Beranda - YPI Portal')
@section('page_title', 'Ringkasan Portal')

@section('styles')
    <style>
        .timeline {
            display: flex;
            justify-content: space-between;
            margin: 40px 0;
            position: relative;
        }

        .timeline::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 5%;
            right: 5%;
            height: 4px;
            background: #e2e8f0;
            z-index: 0;
        }

        .timeline-step {
            position: relative;
            z-index: 1;
            text-align: center;
            width: 20%;
        }

        .step-icon {
            width: 44px;
            height: 44px;
            background: #fff;
            border: 4px solid #e2e8f0;
            border-radius: 50%;
            margin: 0 auto 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            transition: 0.3s;
        }

        .timeline-step.active .step-icon {
            border-color: var(--primary);
            color: var(--primary);
        }

        .timeline-step.completed .step-icon {
            background: var(--primary);
            border-color: var(--primary);
            color: #fff;
        }

        .step-label {
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--text-muted);
        }

        .timeline-step.active .step-label {
            color: var(--primary);
        }

        .program-card {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        @media (max-width: 768px) {
            .program-card {
                flex-direction: column;
                text-align: center;
            }

            .timeline {
                display: none;
            }
        }
    </style>
@endsection

@section('content')
    @if(session('success'))
        <div
            style="background: #dcfce7; color: #166534; padding: 15px; border-radius: 12px; margin-bottom: 25px; font-weight: 600;">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <h3 style="margin-bottom: 5px;">Selamat Datang, {{ Auth::user()->name }}!</h3>
        <p style="color: var(--text-muted);">Berikut adalah status perjalanan pendidikan Anda di YPI.</p>

        @if($admission)
            <!-- Timeline Progress -->
            <div class="timeline">
                <div class="timeline-step completed">
                    <div class="step-icon">1</div>
                    <div class="step-label">Pendaftaran</div>
                </div>
                <div class="timeline-step {{ $admission->status != 'pending' ? 'completed' : 'active' }}">
                    <div class="step-icon">2</div>
                    <div class="step-label">Verifikasi Data</div>
                </div>
                <div
                    class="timeline-step {{ $admission->payment_status == 'paid' ? 'completed' : ($admission->status == 'approved' ? 'active' : '') }}">
                    <div class="step-icon">3</div>
                    <div class="step-label">Pembayaran</div>
                </div>
                <div
                    class="timeline-step {{ $admission->status == 'approved' && $admission->payment_status == 'paid' ? 'active' : '' }}">
                    <div class="step-icon">4</div>
                    <div class="step-label">Jadwal Kelas</div>
                </div>
                <div class="timeline-step">
                    <div class="step-icon">5</div>
                    <div class="step-label">Mulai Belajar</div>
                </div>
            </div>

            <hr style="border: 0; border-top: 1px solid #f1f5f9; margin: 30px 0;">

            <div class="program-card">
                <div style="flex: 1;">
                    <h4 style="color: var(--text-muted); text-transform: uppercase; font-size: 0.8rem; margin-bottom: 10px;">
                        Program Yang Anda Pilih</h4>
                    <h2 style="font-size: 1.8rem; margin-bottom: 15px;">{{ $admission->program->title }}</h2>
                    <div style="display: flex; gap: 20px; margin-bottom: 20px;">
                        <div>
                            <span style="font-size: 0.8rem; color: var(--text-muted); display: block;">Status Seleksi</span>
                            <span
                                class="badge badge-{{ $admission->status == 'pending' ? 'pending' : ($admission->status == 'approved' ? 'approved' : 'danger') }}">
                                {{ $admission->status == 'pending' ? 'Sedang Diverifikasi' : ($admission->status == 'approved' ? 'Diterima' : 'Dibatalkan') }}
                            </span>
                        </div>
                        <div>
                            <span style="font-size: 0.8rem; color: var(--text-muted); display: block;">Status Pembayaran</span>
                            <span
                                style="font-weight: 700; {{ $admission->payment_status == 'paid' ? 'color: #166534;' : 'color: #ef4444;' }}">
                                {{ $admission->payment_status == 'paid' ? '✅ SUDAH LUNAS' : '⏳ BELUM BAYAR' }}
                            </span>
                        </div>
                    </div>

                    @if($admission->status == 'approved' && $admission->payment_status == 'unpaid')
                        <div
                            style="background: #eff6ff; padding: 20px; border-radius: 12px; border-left: 5px solid var(--primary);">
                            <p style="font-weight: 600; margin-bottom: 15px;">Mohon selesaikan pembayaran untuk mengaktifkan jadwal
                                kelas Anda.</p>
                            <a href="#" class="btn btn-primary">Bayar Biaya Pendaftaran</a>
                        </div>
                    @endif
                </div>

                @if($admission->program->image)
                    <div style="width: 250px;">
                        <img src="{{ asset('storage/' . $admission->program->image) }}"
                            style="width: 100%; border-radius: 12px; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);">
                    </div>
                @endif
            </div>
        @else
            <div style="text-align: center; padding: 40px 0;">
                <p style="font-size: 1.2rem; color: var(--text-muted); margin-bottom: 20px;">Anda belum memilih program
                    pelatihan.</p>
                <a href="{{ route('programs') }}" class="btn btn-primary">Cari Program Sekarang</a>
            </div>
        @endif
    </div>

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px;">
        <!-- Schedule Section -->
        <div class="card">
            <h3 style="margin-bottom: 20px;">📅 Jadwal Pelatihan & Seleksi</h3>
            @if($admission && $admission->status == 'approved')
                <div style="border-left: 3px solid var(--primary); padding-left: 20px;">
                    <div style="margin-bottom: 20px;">
                        <h4 style="margin-bottom: 5px;">Orientasi Siswa Baru</h4>
                        <p style="color: var(--text-muted); font-size: 0.9rem;">Senin, 15 Januari 2026 | 09:00 WIB</p>
                    </div>
                    <div>
                        <h4 style="margin-bottom: 5px;">Pertemuan Kelas Pertama</h4>
                        <p style="color: var(--text-muted); font-size: 0.9rem;">Rabu, 17 Januari 2026 | 08:00 WIB</p>
                    </div>
                    <a href="#"
                        style="display: block; margin-top: 20px; font-weight: 700; color: var(--primary); font-size: 0.9rem;">Lihat
                        Seluruh Jadwal &rarr;</a>
                </div>
            @else
                <div
                    style="background: #f8fafc; padding: 20px; border-radius: 12px; color: var(--text-muted); text-align: center;">
                    Jadwal pelatihan akan muncul di sini setelah status pendaftaran Anda <strong>Disetujui</strong>.
                </div>
            @endif
        </div>

        <!-- Sidebar / Info -->
        <div class="card">
            <h3 style="margin-bottom: 20px;">💡 Informasi</h3>
            <p style="font-size: 0.9rem; color: var(--text-muted); line-height: 1.8;">
                Gunakan portal ini untuk memantau status pendaftaran, melakukan pembayaran, dan mengakses jadwal pelatihan
                Anda.
                <br><br>
                Butuh bantuan? <br>
                <a href="#" style="color: var(--primary); font-weight: 700;">Hubungi Admin YPI</a>
            </p>
        </div>
    </div>
@endsection