<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutSectionController extends Controller
{
    /**
     * Tampilkan form untuk mengedit halaman "Tentang Kami".
     */
    public function edit()
    {
        // Ambil data "Tentang Kami" pertama, atau buat instance baru jika belum ada
        $aboutSection = AboutSection::firstOrNew();
        return view('admin.about.edit', compact('aboutSection'));
    }

    /**
     * Simpan perubahan pada halaman "Tentang Kami".
     */
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'description' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);

        // Ambil data "Tentang Kami"
        $aboutSection = AboutSection::firstOrNew();

        // Proses upload gambar jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($aboutSection->image) {
                Storage::disk('public')->delete($aboutSection->image);
            }
            // Simpan gambar baru
            $path = $request->file('image')->store('about_images', 'public');
            $aboutSection->image = $path;
        }

        // Update data lainnya
        $aboutSection->description = $request->input('description');
        $aboutSection->vision = $request->input('vision');
        $aboutSection->mission = $request->input('mission');
        $aboutSection->save();

        return redirect()->route('admin.about.edit')->with('success', 'Halaman "Tentang Kami" berhasil diperbarui!');
    }
}
