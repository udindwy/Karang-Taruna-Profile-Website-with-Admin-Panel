<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    // ... method edit() Anda kemungkinan sudah ada di sini ...
    public function edit()
    {
        $setting = Setting::first();
        return view('admin.settings.edit', compact('setting'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $setting = Setting::firstOrCreate([]);

        $validatedData = $request->validate([
            'site_name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'theme_color' => 'nullable|string|max:7',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
        ]);

        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada dan bukan logo default
            if ($setting->logo) {
                Storage::delete('public/' . $setting->logo);
            }
            // Simpan logo baru dan update path di data yang akan disimpan
            $validatedData['logo'] = $request->file('logo')->store('settings', 'public');
        }

        $setting->update($validatedData);

        return redirect()->route('admin.settings.edit')->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
