@extends('layouts.portal')

@section('title', 'Profil Saya - YPI Portal')
@section('page_title', 'Pengaturan Profil')

@section('content')
    <div class="card" style="max-width: 700px;">
        <h3 style="margin-bottom: 25px;">Data Informasi Siswa</h3>

        @if(session('success'))
            <div
                style="background: #dcfce7; color: #166534; padding: 15px; border-radius: 12px; margin-bottom: 25px; font-weight: 600;">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('student.profile.update') }}" method="POST">
            @csrf
            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 700; color: var(--text-muted);">Nama
                    Lengkap</label>
                <input type="text" name="name" value="{{ $user->name }}"
                    style="width: 100%; padding: 12px 15px; border: 1px solid #e2e8f0; border-radius: 12px; font-family: inherit; font-size: 1rem;"
                    required>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 700; color: var(--text-muted);">Alamat
                    Email</label>
                <input type="email" name="email" value="{{ $user->email }}"
                    style="width: 100%; padding: 12px 15px; border: 1px solid #e2e8f0; border-radius: 12px; font-family: inherit; font-size: 1rem;"
                    required>
            </div>

            <hr style="border: 0; border-top: 1px solid #f1f5f9; margin: 30px 0;">

            <h4 style="margin-bottom: 20px;">Ubah Password</h4>
            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 700; color: var(--text-muted);">Password Baru
                    (Kosongkan jika tidak diubah)</label>
                <input type="password" name="password"
                    style="width: 100%; padding: 12px 15px; border: 1px solid #e2e8f0; border-radius: 12px; font-family: inherit; font-size: 1rem;">
            </div>

            <div style="margin-bottom: 30px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 700; color: var(--text-muted);">Konfirmasi
                    Password Baru</label>
                <input type="password" name="password_confirmation"
                    style="width: 100%; padding: 12px 15px; border: 1px solid #e2e8f0; border-radius: 12px; font-family: inherit; font-size: 1rem;">
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">Simpan Perubahan Profil</button>
        </form>
    </div>
@endsection