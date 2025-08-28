<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Tampilkan daftar foto di galeri.
     */
    public function index()
    {
        $galleries = Gallery::orderBy('id', 'desc')->paginate(10);
        return view('admin.galleries.index', compact('galleries'));
    }

    /**
     * Tampilkan form untuk mengunggah foto baru.
     */
    public function create()
    {
        return view('admin.galleries.create');
    }

    /**
     * Simpan foto baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'caption' => 'nullable|string|max:255',
        ]);

        $path = $request->file('image')->store('gallery_images', 'public');

        Gallery::create([
            'image' => $path,
            'caption' => $request->caption,
        ]);

        return redirect()->route('admin.galleries.index')->with('success', 'Foto berhasil ditambahkan ke galeri!');
    }

    /**
     * Tampilkan form untuk mengedit foto.
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    /**
     * Perbarui data foto di database.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'caption' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }
            $path = $request->file('image')->store('gallery_images', 'public');
            $gallery->image = $path;
        }

        $gallery->caption = $request->caption;
        $gallery->save();

        return redirect()->route('admin.galleries.index')->with('success', 'Foto galeri berhasil diperbarui!');
    }

    /**
     * Hapus foto dari database.
     */
    public function destroy(Gallery $gallery)
    {
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }
        $gallery->delete();

        return redirect()->route('admin.galleries.index')->with('success', 'Foto galeri berhasil dihapus!');
    }
}
