@extends('layouts.admin')

@section('title', 'Edit Slider - Yayasan Pembaharuan Indonesia')
@section('admin_title', 'Edit Slider')

@section('admin_content')
    <div class="admin-card" style="max-width: 800px;">
        <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600;">Gambar Slider</label>
                <div style="margin-bottom: 10px;">
                    <img src="{{ asset('storage/' . $slider->image) }}" alt="Current Slider"
                        style="width: 200px; height: auto; border-radius: 8px; border: 1px solid #e5e7eb;">
                    <p style="font-size: 0.8rem; color: #6b7280;">Gambar saat ini</p>
                </div>
                <input type="file" name="image"
                    style="width: 100%; padding: 10px; background: #f9fafb; border: 1px dashed #d1d5db; border-radius: 8px;">
                <p style="font-size: 0.8rem; color: #6b7280; margin-top: 5px;">Format: JPG, PNG, WEBP. Maks: 2MB. Kosongkan
                    jika tidak ingin mengubah gambar.</p>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600;">Headline</label>
                <input type="text" name="headline" value="{{ $slider->headline }}"
                    style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 8px;"
                    placeholder="Masukkan headline slider...">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600;">Sub Headline</label>
                <textarea name="sub_headline" rows="4"
                    style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 8px; resize: vertical;"
                    placeholder="Masukkan sub headline slider...">{{ $slider->sub_headline }}</textarea>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600;">Urutan</label>
                <input type="number" name="order" value="{{ $slider->order }}"
                    style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 8px;">
            </div>

            <div style="margin-bottom: 25px;">
                <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; font-weight: 500;">
                    <input type="checkbox" name="is_active" value="1" style="width: 18px; height: 18px;" {{ $slider->is_active ? 'checked' : '' }}>
                    <span>Aktif</span>
                </label>
            </div>

            <div style="display: flex; gap: 15px; border-top: 1px solid #f3f4f6; padding-top: 25px;">
                <a href="{{ route('admin.sliders.index') }}" class="btn btn-outline" style="flex: 1;">Batal</a>
                <button type="submit" class="btn btn-primary" style="flex: 2;">Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection