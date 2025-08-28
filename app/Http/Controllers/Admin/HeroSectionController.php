<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroSectionController extends Controller
{
    /**
     * tampilkan form untuk mengedit Hero Section.
     */
    public function edit()
    {
        // ambil data Hero Section pertama, atau buat instance baru jika belum ada
        $heroSection = HeroSection::firstOrNew();
        return view('admin.hero_sections.edit', compact('heroSection'));
    }

    /**
     * simpan perubahan pada Hero Section.
     */
    public function update(Request $request)
    {
        // validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);

        // ambil data Hero Section
        $heroSection = HeroSection::firstOrNew();

        // proses upload gambar jika ada
        if ($request->hasFile('image')) {
            // hapus gambar lama jika ada
            if ($heroSection->image) {
                Storage::disk('public')->delete($heroSection->image);
            }
            // simpan gambar baru
            $path = $request->file('image')->store('hero_images', 'public');
            $heroSection->image = $path;
        }

        // update data lainnya
        $heroSection->title = $request->input('title');
        $heroSection->subtitle = $request->input('subtitle');
        $heroSection->save();

        return redirect()->route('admin.hero.edit')->with('success', 'Hero Section berhasil diperbarui!');
    }
}
