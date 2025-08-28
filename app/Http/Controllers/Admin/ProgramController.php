<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::orderBy('id', 'desc')->paginate(10);
        return view('admin.programs.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.programs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('photo')->store('program_photos', 'public');

        Program::create([
            'title' => $request->title,
            'description' => $request->description,
            'photo' => $path,
        ]);

        return redirect()->route('admin.programs.index')->with('success', 'Program berhasil ditambahkan!');
    }

    public function edit(Program $program)
    {
        return view('admin.programs.edit', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($program->photo) {
                Storage::disk('public')->delete($program->photo);
            }
            $path = $request->file('photo')->store('program_photos', 'public');
            $program->photo = $path;
        }

        $program->title = $request->title;
        $program->description = $request->description;
        $program->save();

        return redirect()->route('admin.programs.index')->with('success', 'Program berhasil diperbarui!');
    }

    public function destroy(Program $program)
    {
        if ($program->photo) {
            Storage::disk('public')->delete($program->photo);
        }
        $program->delete();

        return redirect()->route('admin.programs.index')->with('success', 'Program berhasil dihapus!');
    }
}
