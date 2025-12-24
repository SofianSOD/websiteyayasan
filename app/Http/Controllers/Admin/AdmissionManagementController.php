<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use Illuminate\Http\Request;

class AdmissionManagementController extends Controller
{
    public function index()
    {
        $admissions = Admission::with(['user', 'program'])->latest()->get();
        return view('admin.admissions.index', compact('admissions'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
            'payment_status' => 'required|in:unpaid,paid',
        ]);

        $admission = Admission::findOrFail($id);
        $admission->update([
            'status' => $request->status,
            'payment_status' => $request->payment_status,
        ]);

        return back()->with('success', 'Status pendaftaran berhasil diperbarui.');
    }
}
