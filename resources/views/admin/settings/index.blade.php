@extends('layouts.admin')

@section('title', 'Pengaturan - Yayasan Pembaharuan Indonesia')
@section('admin_title', 'Pengaturan Website')

@section('admin_content')
    @if(session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 10px; border-radius: 6px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
        <div class="admin-card">
            <h4 style="margin-bottom: 20px;">Identitas Yayasan</h4>
            <form action="{{ route('admin.settings.update') }}" method="POST">
                @csrf
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px; font-weight: 600;">Nama Yayasan</label>
                    <input type="text" value="Yayasan Pembaharuan Indonesia"
                        style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 8px;">
                </div>
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px; font-weight: 600;">Email Kontak</label>
                    <input type="email" value="info@yayasanpi.ac.id"
                        style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 8px;">
                </div>
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px; font-weight: 600;">Telepon/WA</label>
                    <input type="text" value="+62 812-3456-7890"
                        style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 8px;">
                </div>
                <button type="submit" class="btn btn-primary">Simpan Identitas</button>
            </form>
        </div>

        <div class="admin-card">
            <h4 style="margin-bottom: 20px;">Sosial Media & Alamat</h4>
            <form action="{{ route('admin.settings.update') }}" method="POST">
                @csrf
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px; font-weight: 600;">Instagram</label>
                    <input type="text" value="https://instagram.com/ypi_official"
                        style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 8px;">
                </div>
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px; font-weight: 600;">Alamat Kantor</label>
                    <textarea rows="3"
                        style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 8px;">Jl. Contoh No. 123, Jakarta Selatan</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Kontak</button>
            </form>
        </div>
    </div>
@endsection