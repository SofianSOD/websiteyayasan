<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramManagementController extends Controller
{
    public function index()
    {
        $programs = Program::latest()->get();
        return view('admin.programs.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.programs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|max:255',
            'title' => 'required|max:255',
            'slug' => 'required|max:255|unique:programs,slug',
            'description' => 'required',
            'price' => 'required|numeric',
            'duration' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('programs', 'public');
        }

        Program::create($data);

        return redirect()->route('admin.programs.index')->with('success', 'Program berhasil ditambahkan.');
    }

    public function edit(Program $program)
    {
        return view('admin.programs.edit', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $request->validate([
            'category' => 'required|max:255',
            'title' => 'required|max:255',
            'slug' => 'required|max:255|unique:programs,slug,' . $program->id,
            'description' => 'required',
            'price' => 'required|numeric',
            'duration' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('programs', 'public');
        }

        $program->update($data);

        return redirect()->route('admin.programs.index')->with('success', 'Program berhasil diperbarui.');
    }

    public function destroy(Program $program)
    {
        $program->delete();
        return redirect()->route('admin.programs.index')->with('success', 'Program berhasil dihapus.');
    }
}
