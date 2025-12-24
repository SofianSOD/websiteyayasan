@extends('layouts.admin')

@section('title', 'Manajemen Galeri')
@section('admin_title', 'Manajemen Galeri')

@section('admin_content')
    <div class="card">
        <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
            <h2 class="card-title">Daftar Galeri Kegiatan</h2>
            <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">Tambah Foto</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success"
                    style="background: #ecfdf5; color: #065f46; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($galleries as $gallery)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}"
                                        style="width: 80px; height: 60px; object-fit: cover; border-radius: 4px;">
                                </td>
                                <td>{{ $gallery->title }}</td>
                                <td>{{ $gallery->category }}</td>
                                <td>
                                    <span class="badge {{ $gallery->is_active ? 'badge-success' : 'badge-danger' }}"
                                        style="background: {{ $gallery->is_active ? '#ecfdf5' : '#fef2f2' }}; color: {{ $gallery->is_active ? '#065f46' : '#991b1b' }};">
                                        {{ $gallery->is_active ? 'Aktif' : 'Non-aktif' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.galleries.edit', $gallery->id) }}" class="btn btn-sm btn-outline"
                                        style="padding: 5px 10px; font-size: 0.8rem;">Edit</a>
                                    <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            style="padding: 5px 10px; font-size: 0.8rem; background: #fee2e2; color: #991b1b; border: none;"
                                            onclick="return confirm('Yakin ingin menghapus foto ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align: center; padding: 30px;">Belum ada foto galeri.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection