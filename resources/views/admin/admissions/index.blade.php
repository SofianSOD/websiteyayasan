@extends('layouts.admin')

@section('title', 'Manajemen Peserta - Yayasan Pembaharuan Indonesia')
@section('admin_title', 'Manajemen Peserta')

@section('admin_content')
    @if(session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 10px; border-radius: 6px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="admin-card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3>Daftar Pendaftaran</h3>
            <button class="btn btn-outline" style="font-size: 0.8rem; padding: 5px 15px;">Ekspor CSV</button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Siswa</th>
                    <th>Program</th>
                    <th>Status</th>
                    <th>Pembayaran</th>
                    <th>Dokumen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admissions as $admission)
                    @php
                        $docs = is_string($admission->documents) ? json_decode($admission->documents, true) : $admission->documents;
                    @endphp
                    <tr>
                        <td style="font-weight: 600;">{{ $admission->user->name }}</td>
                        <td>{{ $admission->program->title }}</td>
                        <td>
                            <span class="status-badge status-{{ $admission->status }}">
                                {{ strtoupper($admission->status) }}
                            </span>
                        </td>
                        <td>
                            <strong style="color: {{ $admission->payment_status == 'paid' ? '#166534' : '#ef4444' }};">
                                {{ strtoupper($admission->payment_status) }}
                            </strong>
                        </td>
                        <td>
                            <div style="display: flex; flex-direction: column; gap: 5px;">
                                @if(isset($docs['ktp']))
                                    <a href="{{ asset('storage/' . $docs['ktp']) }}" target="_blank"
                                        style="color: var(--primary-color); font-size: 0.8rem; font-weight: 600;">📄 KTP</a>
                                @endif
                                @if(isset($docs['ijazah']))
                                    <a href="{{ asset('storage/' . $docs['ijazah']) }}" target="_blank"
                                        style="color: var(--primary-color); font-size: 0.8rem; font-weight: 600;">🎓 Ijazah</a>
                                @endif
                                @if(!isset($docs['ktp']) && !isset($docs['ijazah']))
                                    <span style="color: #9ca3af; font-size: 0.8rem;">Tidak ada dokumen</span>
                                @endif
                            </div>
                        </td>
                        <td>
                            <form action="{{ route('admin.admissions.update', $admission->id) }}" method="POST"
                                style="display: flex; gap: 5px;">
                                @csrf
                                @method('PATCH')
                                <select name="status"
                                    style="font-size: 0.8rem; padding: 5px; border-radius: 4px; border: 1px solid #d1d5db;">
                                    <option value="pending" {{ $admission->status == 'pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="approved" {{ $admission->status == 'approved' ? 'selected' : '' }}>Approve
                                    </option>
                                    <option value="rejected" {{ $admission->status == 'rejected' ? 'selected' : '' }}>Reject
                                    </option>
                                </select>
                                <select name="payment_status"
                                    style="font-size: 0.8rem; padding: 5px; border-radius: 4px; border: 1px solid #d1d5db;">
                                    <option value="unpaid" {{ $admission->payment_status == 'unpaid' ? 'selected' : '' }}>Unpaid
                                    </option>
                                    <option value="paid" {{ $admission->payment_status == 'paid' ? 'selected' : '' }}>Paid
                                    </option>
                                </select>
                                <button type="submit" class="btn btn-primary"
                                    style="padding: 5px 12px; font-size: 0.8rem;">Update</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection