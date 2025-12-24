@extends('layouts.admin')

@section('title', 'Manajemen Berita - Yayasan Pembaharuan Indonesia')
@section('admin_title', 'Manajemen Berita')

@section('admin_content')
    @if(session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 10px; border-radius: 6px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="admin-card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3>Daftar Artikel</h3>
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary" style="font-size: 0.85rem;">+ Tambah
                Berita</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                    <tr>
                        <td style="font-weight: 600;">{{ Str::limit($post->title, 50) }}</td>
                        <td>
                            <span class="status-badge {{ $post->is_published ? 'status-approved' : 'status-pending' }}">
                                {{ $post->is_published ? 'Published' : 'Draft' }}
                            </span>
                        </td>
                        <td>{{ $post->created_at->format('d M Y') }}</td>
                        <td>
                            <div style="display: flex; gap: 15px;">
                                <a href="{{ route('admin.posts.edit', $post->id) }}"
                                    style="color: var(--primary-color); font-weight: 600;">Edit</a>
                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST"
                                    onsubmit="return confirm('Hapus berita ini?')">
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
                        <td colspan="4" style="text-align: center; color: #6b7280; padding: 30px;">Belum ada berita yang
                            ditulis.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection