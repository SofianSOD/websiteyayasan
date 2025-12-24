@extends('layouts.public')

@section('title', 'Daftar - Yayasan Pembaharuan Indonesia')

@section('content')
    <div class="container" style="padding: 80px 20px;">
        <div
            style="max-width: 500px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border: 1px solid #e5e7eb;">
            <h2 style="text-align: center; margin-bottom: 30px; color: var(--text-color);">Daftar Akun Baru</h2>

            @if ($errors->any())
                <div
                    style="background-color: #fee2e2; color: #991b1b; padding: 10px; border-radius: 6px; margin-bottom: 20px; font-size: 0.9rem;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div style="margin-bottom: 15px;">
                    <label for="name" style="display: block; margin-bottom: 5px; font-weight: 600;">Nama Lengkap</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;" required
                        autofocus>
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="email" style="display: block; margin-bottom: 5px; font-weight: 600;">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;" required>
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="password" style="display: block; margin-bottom: 5px; font-weight: 600;">Password</label>
                    <input type="password" id="password" name="password"
                        style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;" required>
                </div>

                <div style="margin-bottom: 20px;">
                    <label for="password_confirmation"
                        style="display: block; margin-bottom: 5px; font-weight: 600;">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;" required>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%;">Daftar Sekarang</button>
            </form>

            <p style="text-align: center; margin-top: 20px; font-size: 0.9rem;">
                Sudah punya akun? <a href="{{ route('login') }}"
                    style="color: var(--primary-color); font-weight: 600;">Masuk disini</a>
            </p>
        </div>
    </div>
@endsection