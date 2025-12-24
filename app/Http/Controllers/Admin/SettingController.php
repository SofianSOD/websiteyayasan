<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        // For prototype, using hardcoded settings or session flash.
        // In real app, these would come from a 'settings' table.
        return view('admin.settings.index');
    }

    public function update(Request $request)
    {
        // Mock update logic
        return back()->with('success', 'Pengaturan berhasil diperbarui secara simulasi.');
    }
}
