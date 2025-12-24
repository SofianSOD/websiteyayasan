@extends('layouts.admin')

@section('title', 'Katalog Program - Yayasan Pembaharuan Indonesia')
@section('admin_title', 'Katalog Program')

@section('admin_content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <h3>Daftar Program Pelatihan</h3>
        <a href="{{ route('admin.programs.create') }}" class="btn btn-primary" style="font-size: 0.85rem;">+ Tambah
            Program</a>
    </div>

    @if(session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 10px; border-radius: 6px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="admin-card">
        <table class="table">
            <thead>
                <tr>
                    <th>Kategori</th>
                    <th>Nama Program</th>
                    <th>Harga</th>
                    <th>Durasi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($programs as $program)
                    <tr>
                        <td style="font-weight: 600; color: var(--primary-color);">{{ $program->category }}</td>
                        <td style="font-weight: 600;">{{ $program->title }}</td>
                        <td>Rp {{ number_format($program->price, 0, ',', '.') }}</td>
                        <td>{{ $program->duration }}</td>
                        <td>
                            <span class="status-badge {{ $program->is_active ? 'status-approved' : 'status-rejected' }}">
                                {{ $program->is_active ? 'Aktif' : 'Non-Aktif' }}
                            </span>
                        </td>
                        <td>
                            <div style="display: flex; gap: 15px;">
                                <a href="{{ route('admin.programs.edit', $program->id) }}"
                                    style="color: var(--primary-color); font-weight: 600;">Edit</a>
                                <form action="{{ route('admin.programs.destroy', $program->id) }}" method="POST"
                                    onsubmit="return confirm('Hapus program ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        style="background: none; border: none; color: #ef4444; cursor: pointer; padding: 0; font-weight: 600;">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center; color: #6b7280; padding: 30px;">Belum ada program pelatihan
                            yang terdaftar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection