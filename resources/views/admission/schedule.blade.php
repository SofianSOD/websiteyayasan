@extends('layouts.portal')

@section('title', 'Jadwal Saya - YPI Portal')
@section('page_title', 'Jadwal Pelatihan & Seleksi')

@section('content')
    <div class="card">
        <h3 style="margin-bottom: 20px;">Status Jadwal Anda</h3>

        @if($admission)
            <div
                style="margin-bottom: 30px; padding: 20px; background: #f8fafc; border-radius: 12px; border-left: 5px solid var(--primary);">
                <p><strong>Program Dipilih:</strong> {{ $admission->program->title }}</p>
                <p><strong>Status Pendaftaran:</strong>
                    <span
                        class="badge badge-{{ $admission->status == 'pending' ? 'pending' : ($admission->status == 'approved' ? 'approved' : 'danger') }}">
                        {{ $admission->status == 'pending' ? 'Menunggu Verifikasi' : ($admission->status == 'approved' ? 'Disetujui' : 'Ditolak') }}
                    </span>
                </p>
            </div>

            @if($admission->status == 'approved')
                <div style="display: grid; gap: 20px;">
                    <div
                        style="display: flex; gap: 20px; align-items: flex-start; padding: 20px; background: #fff; border: 1px solid #e2e8f0; border-radius: 12px;">
                        <div
                            style="background: var(--primary); color: white; padding: 10px; border-radius: 10px; min-width: 60px; text-align: center;">
                            <div style="font-size: 0.8rem; font-weight: 700;">JAN</div>
                            <div style="font-size: 1.25rem; font-weight: 800;">15</div>
                        </div>
                        <div>
                            <h4 style="margin-bottom: 5px;">Orientasi Siswa Baru</h4>
                            <p style="color: var(--text-muted); font-size: 0.9rem;">Senin | 09:00 - 12:00 WIB</p>
                            <p style="color: var(--text-muted); font-size: 0.85rem; margin-top: 5px;">Lokasi: Aula Utama Yayasan
                                (Gedung A)</p>
                        </div>
                    </div>

                    <div
                        style="display: flex; gap: 20px; align-items: flex-start; padding: 20px; background: #fff; border: 1px solid #e2e8f0; border-radius: 12px;">
                        <div
                            style="background: var(--primary); color: white; padding: 10px; border-radius: 10px; min-width: 60px; text-align: center;">
                            <div style="font-size: 0.8rem; font-weight: 700;">JAN</div>
                            <div style="font-size: 1.25rem; font-weight: 800;">17</div>
                        </div>
                        <div>
                            <h4 style="margin-bottom: 5px;">Mulai Pembelajaran Kelas</h4>
                            <p style="color: var(--text-muted); font-size: 0.9rem;">Rabu | 08:00 - 16:00 WIB</p>
                            <p style="color: var(--text-muted); font-size: 0.85rem; margin-top: 5px;">Pengajar: Tim Instruktur
                                Vokasi YPI</p>
                        </div>
                    </div>
                </div>
            @else
                <div style="text-align: center; padding: 40px; color: var(--text-muted);">
                    <p style="font-size: 1.1rem;">Jadwal seleksi dan kelas akan ditampilkan secara otomatis setelah pendaftaran Anda
                        **disetujui** oleh admin.</p>
                </div>
            @endif
        @else
            <div style="text-align: center; padding: 40px;">
                <p style="color: var(--text-muted); margin-bottom: 20px;">Anda belum terdaftar dalam program apapun.</p>
                <a href="{{ route('student.programs') }}" class="btn btn-primary">Lihat Katalog Program</a>
            </div>
        @endif
    </div>
@endsection