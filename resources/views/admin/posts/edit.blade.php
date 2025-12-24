@extends('layouts.admin')

@section('title', 'Edit Berita - Yayasan Pembaharuan Indonesia')
@section('admin_title', 'Edit Berita')

@section('admin_content')
    <div class="admin-card" style="max-width: 800px;">
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600;">Judul Berita</label>
                <input type="text" name="title" value="{{ $post->title }}"
                    style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 8px;" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600;">Konten Berita</label>
                <textarea name="content" rows="12"
                    style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 8px; resize: vertical;"
                    required>{{ $post->content }}</textarea>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600;">Foto Unggulan (Kosongkan jika tidak
                    diubah)</label>
                @if($post->image)
                    <div style="margin-bottom: 10px;">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Current Image"
                            style="height: 120px; border-radius: 8px; border: 1px solid #e5e7eb;">
                    </div>
                @endif
                <input type="file" name="image"
                    style="width: 100%; padding: 10px; background: #f9fafb; border: 1px dashed #d1d5db; border-radius: 8px;">
            </div>

            <div style="margin-bottom: 25px;">
                <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; font-weight: 500;">
                    <input type="checkbox" name="is_published" value="1" style="width: 18px; height: 18px;" {{ $post->is_published ? 'checked' : '' }}>
                    <span>Terbitkan Langsung</span>
                </label>
            </div>

            <div style="display: flex; gap: 15px; border-top: 1px solid #f3f4f6; padding-top: 25px;">
                <a href="{{ route('admin.posts.index') }}" class="btn btn-outline" style="flex: 1;">Batal</a>
                <button type="submit" class="btn btn-primary" style="flex: 2;">Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection