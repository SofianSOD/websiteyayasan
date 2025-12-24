@extends('layouts.admin')

@section('title', 'Laporan - Yayasan Pembaharuan Indonesia')
@section('admin_title', 'Laporan & Statistik')

@section('admin_content')
    <div
        style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-bottom: 40px;">
        <div class="admin-card">
            <h4 style="color: #6b7280; margin-bottom: 15px;">Statistik Pendaftaran</h4>
            <div style="display: flex; flex-direction: column; gap: 10px;">
                <div style="display: flex; justify-content: space-between;">
                    <span>Total Pendaftaran:</span>
                    <span style="font-weight: 700;">{{ $stats['total_admissions'] }}</span>
                </div>
                <div style="display: flex; justify-content: space-between;">
                    <span>Disetujui:</span>
                    <span style="color: #166534; font-weight: 700;">{{ $stats['approved_admissions'] }}</span>
                </div>
                <div style="display: flex; justify-content: space-between;">
                    <span>Pending:</span>
                    <span style="color: #f59e0b; font-weight: 700;">{{ $stats['pending_admissions'] }}</span>
                </div>
            </div>
        </div>

        <div class="admin-card">
            <h4 style="color: #6b7280; margin-bottom: 15px;">Statistik Keuangan</h4>
            <div style="display: flex; flex-direction: column; gap: 10px;">
                <div style="display: flex; justify-content: space-between;">
                    <span>Total Pembayaran (Lunas):</span>
                    <span style="font-weight: 700;">{{ $stats['paid_admissions'] }}</span>
                </div>
                <div
                    style="display: flex; justify-content: space-between; margin-top: 10px; padding-top: 10px; border-top: 1px solid #f3f4f6;">
                    <span style="font-weight: 600;">Total Pendapatan:</span>
                    <span style="color: var(--primary-color); font-weight: 700; font-size: 1.25rem;">Rp
                        {{ number_format($stats['total_revenue'], 0, ',', '.') }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="admin-card">
        <h4 style="margin-bottom: 20px;">Ekspor Laporan</h4>
        <div style="display: flex; gap: 15px;">
            <a href="{{ route('admin.reports.rekap') }}" target="_blank" class="btn btn-outline"
                style="text-decoration: none;">Unduh Rekap (PDF)</a>
            <a href="{{ route('admin.reports.export.csv') }}" class="btn btn-primary" style="text-decoration: none;">Unduh
                Data (Excel/CSV)</a>
        </div>
    </div>
@endsection