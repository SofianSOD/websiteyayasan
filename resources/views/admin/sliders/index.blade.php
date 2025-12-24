@extends('layouts.admin')

@section('title', 'Manajemen Slider - Yayasan Pembaharuan Indonesia')
@section('admin_title', 'Manajemen Slider')

@section('admin_content')
    @if(session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 10px; border-radius: 6px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="admin-card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3>Daftar Slider</h3>
            <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary" style="font-size: 0.85rem;">+ Tambah
                Slider</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Headline</th>
                    <th>Sub Headline</th>
                    <th>Urutan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sliders as $slider)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $slider->image) }}" alt="Slider Image"
                                style="width: 100px; height: auto; border-radius: 4px;">
                        </td>
                        <td style="font-weight: 600;">{{ $slider->headline ?? '-' }}</td>
                        <td>{{ Str::limit($slider->sub_headline, 50) ?? '-' }}</td>
                        <td>{{ $slider->order }}</td>
                        <td>
                            <span class="status-badge {{ $slider->is_active ? 'status-approved' : 'status-pending' }}">
                                {{ $slider->is_active ? 'Aktif' : 'Non-aktif' }}
                            </span>
                        </td>
                        <td>
                            <div style="display: flex; gap: 15px;">
                                <a href="{{ route('admin.sliders.edit', $slider->id) }}"
                                    style="color: var(--primary-color); font-weight: 600;">Edit</a>
                                <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST"
                                    onsubmit="return confirm('Hapus slider ini?')">
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
                        <td colspan="6" style="text-align: center; color: #6b7280; padding: 30px;">Belum ada slider yang
                            ditambahkan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection