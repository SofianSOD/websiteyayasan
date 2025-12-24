@extends('layouts.admin')

@section('title', 'Edit Program - Yayasan Pembaharuan Indonesia')
@section('admin_title', 'Edit Program')

@section('admin_content')
    <div class="admin-card" style="max-width: 800px;">
        <form action="{{ route('admin.programs.update', $program->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div>
                    <label style="display: block; margin-bottom: 8px; font-weight: 600;">Kategori</label>
                    <select name="category"
                        style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 8px;" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Kursus Komputer" {{ $program->category == 'Kursus Komputer' ? 'selected' : '' }}>Kursus
                            Komputer</option>
                        <option value="Kursus Bahasa" {{ $program->category == 'Kursus Bahasa' ? 'selected' : '' }}>Kursus
                            Bahasa</option>
                        <option value="Bimbingan Al-quran" {{ $program->category == 'Bimbingan Al-quran' ? 'selected' : '' }}>
                            Bimbingan Al-quran</option>
                        <option value="Bimbingan Calistung" {{ $program->category == 'Bimbingan Calistung' ? 'selected' : '' }}>Bimbingan Calistung</option>
                    </select>
                </div>
                <div>
                    <label style="display: block; margin-bottom: 8px; font-weight: 600;">URL Slug (Unik)</label>
                    <input type="text" name="slug" value="{{ $program->slug }}"
                        style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 8px;"
                        placeholder="Contoh: program-office" required>
                </div>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600;">Judul Program</label>
                <input type="text" name="title" value="{{ $program->title }}"
                    style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 8px;"
                    placeholder="Contoh: Web Development Dasar" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600;">Deskripsi Program</label>
                <textarea name="description" rows="5"
                    style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 8px;"
                    placeholder="Jelaskan detail program..." required>{{ $program->description }}</textarea>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div>
                    <label style="display: block; margin-bottom: 8px; font-weight: 600;">Harga (IDR)</label>
                    <input type="number" name="price" value="{{ $program->price }}"
                        style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 8px;"
                        placeholder="Contoh: 1500000" required>
                </div>
                <div>
                    <label style="display: block; margin-bottom: 8px; font-weight: 600;">Durasi</label>
                    <input type="text" name="duration" value="{{ $program->duration }}"
                        style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 8px;"
                        placeholder="Contoh: 3 Bulan" required>
                </div>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600;">Gambar Unggulan</label>
                @if($program->image)
                    <div style="margin-bottom: 10px;">
                        <img src="{{ asset('storage/' . $program->image) }}" alt="Current Image"
                            style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
                    </div>
                @endif
                <input type="file" name="image"
                    style="width: 100%; padding: 10px; background: #f9fafb; border: 1px dashed #d1d5db; border-radius: 8px;">
            </div>

            <div style="margin-bottom: 25px;">
                <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; font-weight: 500;">
                    <input type="checkbox" name="is_active" value="1" style="width: 18px; height: 18px;" {{ $program->is_active ? 'checked' : '' }}>
                    <span>Aktifkan Program</span>
                </label>
            </div>

            <div style="display: flex; gap: 15px; border-top: 1px solid #f3f4f6; padding-top: 25px;">
                <a href="{{ route('admin.programs.index') }}" class="btn btn-outline" style="flex: 1;">Batal</a>
                <button type="submit" class="btn btn-primary" style="flex: 2;">Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection