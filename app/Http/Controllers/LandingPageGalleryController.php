<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Setting;
use Illuminate\Http\Request;

class LandingPageGalleryController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        $galleries = Gallery::latest()->paginate(12);

        return view('landing-page.galleries', compact('galleries', 'setting'));
    }
}
