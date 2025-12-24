@extends('layouts.admin')

@section('title', 'Tambah Foto Galeri')
@section('admin_title', 'Tambah Foto Galeri')

@section('admin_content')
    <div class="card" style="max-width: 800px; margin: 0 auto;">
        <div class="card-header">
            <h2 class="card-title">Tambah Foto Kegiatan</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group" style="margin-bottom: 20px;">
                    <label for="title" style="display: block; margin-bottom: 8px; font-weight: 600;">Judul Kegiatan</label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback" style="color: #dc3545; font-size: 0.85rem; margin-top: 5px;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label for="category" style="display: block; margin-bottom: 8px; font-weight: 600;">Kategori</label>
                    <select name="category" id="category" class="form-control">
                        <option value="Pelatihan">Pelatihan</option>
                        <option value="Uji Kompetensi">Uji Kompetensi</option>
                        <option value="Wisuda">Wisuda</option>
                        <option value="Kunjungan Industri">Kunjungan Industri</option>
                        <option value="Kegiatan Lain">Kegiatan Lain</option>
                    </select>
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label for="image" style="display: block; margin-bottom: 8px; font-weight: 600;">Foto</label>
                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror"
                        required>
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
                        class="form-control">{{ old('description') }}</textarea>
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                        <input type="checkbox" name="is_active" value="1" checked>
                        <span style="font-weight: 600;">Tampilkan di Pubik</span>
                    </label>
                </div>

                <div style="display: flex; gap: 10px; margin-top: 30px;">
                    <button type="submit" class="btn btn-primary">Simpan Foto</button>
                    <a href="{{ route('admin.galleries.index') }}" class="btn btn-outline"
                        style="border: 1px solid #d1d5db; color: #4b5563;">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection