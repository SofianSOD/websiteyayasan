<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = \App\Models\Gallery::latest()->get();
        return view('admin.galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $imagePath = $request->file('image')->store('galleries', 'public');

        \App\Models\Gallery::create([
            'title' => $request->title,
            'image' => $imagePath,
            'category' => $request->category,
            'description' => $request->description,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.galleries.index')->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gallery = \App\Models\Gallery::findOrFail($id);
        return view('admin.galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gallery = \App\Models\Gallery::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $data = [
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'is_active' => $request->has('is_active'),
        ];

        if ($request->hasFile('image')) {
            // Delete old image
            if ($gallery->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($gallery->image);
            }
            $data['image'] = $request->file('image')->store('galleries', 'public');
        }

        $gallery->update($data);

        return redirect()->route('admin.galleries.index')->with('success', 'Foto galeri berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = \App\Models\Gallery::findOrFail($id);
        if ($gallery->image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($gallery->image);
        }
        $gallery->delete();

        return redirect()->route('admin.galleries.index')->with('success', 'Foto galeri berhasil dihapus.');
    }
}
