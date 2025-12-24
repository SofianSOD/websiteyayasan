@extends('layouts.admin')

@section('title', 'Edit Foto Galeri')
@section('admin_title', 'Edit Foto Galeri')

@section('admin_content')
    <div class="card" style="max-width: 800px; margin: 0 auto;">
        <div class="card-header">
            <h2 class="card-title">Edit Foto Kegiatan</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group" style="margin-bottom: 20px;">
                    <label for="title" style="display: block; margin-bottom: 8px; font-weight: 600;">Judul Kegiatan</label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $gallery->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback" style="color: #dc3545; font-size: 0.85rem; margin-top: 5px;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label for="category" style="display: block; margin-bottom: 8px; font-weight: 600;">Kategori</label>
                    <select name="category" id="category" class="form-control">
                        <option value="Pelatihan" {{ $gallery->category == 'Pelatihan' ? 'selected' : '' }}>Pelatihan</option>
                        <option value="Uji Kompetensi" {{ $gallery->category == 'Uji Kompetensi' ? 'selected' : '' }}>Uji
                            Kompetensi</option>
                        <option value="Wisuda" {{ $gallery->category == 'Wisuda' ? 'selected' : '' }}>Wisuda</option>
                        <option value="Kunjungan Industri" {{ $gallery->category == 'Kunjungan Industri' ? 'selected' : '' }}>
                            Kunjungan Industri</option>
                        <option value="Kegiatan Lain" {{ $gallery->category == 'Kegiatan Lain' ? 'selected' : '' }}>Kegiatan
                            Lain</option>
                    </select>
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label for="image" style="display: block; margin-bottom: 8px; font-weight: 600;">Foto (Biarkan kosong
                        jika tidak ingin ganti)</label>
                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                    <div style="margin-top: 10px;">
                        <small style="color: #64748b;">Foto saat ini:</small><br>
                        <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}"
                            style="width: 150px; height: 100px; object-fit: cover; border-radius: 8px; margin-top: 5px; border: 1px solid #e2e8f0;">
                    </div>
                    @error('image')
                        <div class="invalid-feedback" style="color: #dc3545; font-size: 0.85rem; margin-top: 5px;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label for="description" style="display: block; margin-bottom: 8px; font-weight: 600;">Deskripsi
                        Singkat</label>
                    <textarea name="description" id="description" rows="4"
                        class="form-control">{{ old('description', $gallery->description) }}</textarea>
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                        <input type="checkbox" name="is_active" value="1" {{ $gallery->is_active ? 'checked' : '' }}>
                        <span style="font-weight: 600;">Tampilkan di Pubik</span>
                    </label>
                </div>

                <div style="display: flex; gap: 10px; margin-top: 30px;">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('admin.galleries.index') }}" class="btn btn-outline"
                        style="border: 1px solid #d1d5db; color: #4b5563;">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection