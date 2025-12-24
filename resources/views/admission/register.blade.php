@extends('layouts.portal')

@section('title', 'Pendaftaran Program - Yayasan Pembaharuan Indonesia')

@section('content')
    <div style="padding: 20px 0;">
        <div
            style="max-width: 600px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border: 1px solid #e5e7eb;">
            <h2 style="text-align: center; margin-bottom: 30px; color: var(--text-color);">Formulir Pendaftaran</h2>

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

            <form action="{{ route('admission.submit') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div style="margin-bottom: 20px;">
                    <label for="program_id" style="display: block; margin-bottom: 8px; font-weight: 600;">Pilih Program
                        Pelatihan</label>
                    <select id="program_id" name="program_id"
                        style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 8px; background-color: #f9fafb;"
                        required>
                        <option value="">-- Pilih Program --</option>
                        @foreach($programs as $program)
                            <option value="{{ $program->id }}" {{ $selectedProgramId == $program->id ? 'selected' : '' }}>
                                {{ $program->title }} - Rp {{ number_format($program->price, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div style="margin-bottom: 20px; padding: 15px; background: #f3f4f6; border-radius: 8px;">
                    <h4 style="margin-bottom: 10px;">Upload Dokumen Pendukung (Opsional)</h4>
                    <div style="margin-bottom: 15px;">
                        <label for="ktp_path" style="display: block; margin-bottom: 5px; font-size: 0.9rem;">Foto KTP /
                            Kartu Pelajar</label>
                        <input type="file" id="ktp_path" name="ktp_path" style="width: 100%;">
                    </div>
                    <div>
                        <label for="ijazah_path" style="display: block; margin-bottom: 5px; font-size: 0.9rem;">Scan Ijazah
                            Terakhir</label>
                        <input type="file" id="ijazah_path" name="ijazah_path" style="width: 100%;">
                    </div>
                    <p style="font-size: 0.75rem; color: #6b7280; margin-top: 10px;">Format: JPG, PNG, PDF (Maks. 2MB)</p>
                </div>

                <div style="margin-bottom: 25px;">
                    <label for="notes" style="display: block; margin-bottom: 8px; font-weight: 600;">Catatan Tambahan
                        (Opsional)</label>
                    <textarea id="notes" name="notes" rows="3" placeholder="Informasi tambahan atau pertanyaan..."
                        style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 8px;"></textarea>
                </div>

                <div style="display: flex; gap: 15px;">
                    <a href="{{ route('student.dashboard') }}" class="btn btn-outline"
                        style="flex: 1; text-align: center;">Batal</a>
                    <button type="submit" class="btn btn-primary" style="flex: 2;">Kirim Pendaftaran</button>
                </div>
            </form>
        </div>
    </div>
@endsection