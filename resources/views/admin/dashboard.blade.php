@extends('layouts.admin')

@section('title', 'Dashboard - Yayasan Pembaharuan Indonesia')
@section('admin_title', 'Ringkasan Sistem')

@section('admin_content')
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
        <div class="admin-card">
            <p style="color: #6b7280; font-size: 0.9rem;">Total Siswa</p>
            <h3 style="font-size: 2rem;">{{ $stats['total_students'] }}</h3>
        </div>
        <div class="admin-card">
            <p style="color: #6b7280; font-size: 0.9rem;">Pendaftaran Pending</p>
            <h3 style="font-size: 2rem; color: #f59e0b;">{{ $stats['pending_admissions'] }}</h3>
        </div>
        <div class="admin-card">
            <p style="color: #6b7280; font-size: 0.9rem;">Total Program</p>
            <h3 style="font-size: 2rem;">{{ $stats['total_programs'] }}</h3>
        </div>
        <div class="admin-card">
            <p style="color: #6b7280; font-size: 0.9rem;">Total Pendaftaran</p>
            <h3 style="font-size: 2rem;">{{ $stats['total_admissions'] }}</h3>
        </div>
    </div>

    <div class="admin-card" style="margin-top: 30px;">
        <h3>Aktivitas Terbaru</h3>
        <p style="color: #6b7280; margin-top: 10px;">Fitur aktivitas terbaru akan segera hadir.</p>
    </div>
@endsection