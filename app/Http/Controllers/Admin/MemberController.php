<?php

// app/Http/Controllers/Admin/MemberController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    /**
     * Tampilkan daftar pengurus.
     */
    public function index()
    {
        $members = Member::orderBy('id', 'desc')->paginate(10);
        return view('admin.members.index', compact('members'));
    }

    /**
     * Tampilkan form untuk membuat pengurus baru.
     */
    public function create()
    {
        return view('admin.members.create');
    }

    /**
     * Simpan pengurus baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'position' => 'required|string|max:100',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('photo')->store('member_photos', 'public');

        Member::create([
            'name' => $request->name,
            'position' => $request->position,
            'photo' => $path,
        ]);

        return redirect()->route('admin.members.index')->with('success', 'Pengurus berhasil ditambahkan!');
    }

    /**
     * Tampilkan form untuk mengedit pengurus.
     */
    public function edit(Member $member)
    {
        return view('admin.members.edit', compact('member'));
    }

    /**
     * Perbarui data pengurus di database.
     */
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'position' => 'required|string|max:100',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($member->photo) {
                Storage::disk('public')->delete($member->photo);
            }
            $path = $request->file('photo')->store('member_photos', 'public');
            $member->photo = $path;
        }

        $member->name = $request->name;
        $member->position = $request->position;
        $member->save();

        return redirect()->route('admin.members.index')->with('success', 'Data pengurus berhasil diperbarui!');
    }

    /**
     * Hapus pengurus dari database.
     */
    public function destroy(Member $member)
    {
        if ($member->photo) {
            Storage::disk('public')->delete($member->photo);
        }
        $member->delete();

        return redirect()->route('admin.members.index')->with('success', 'Pengurus berhasil dihapus!');
    }
}