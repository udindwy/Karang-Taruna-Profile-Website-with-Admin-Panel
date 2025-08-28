<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Setting;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Menampilkan halaman daftar semua berita (arsip).
     */
    public function index()
    {
        $setting = Setting::first();

        $news = News::latest('published_at')->paginate(9);

        // [DIPERBAIKI] Menggunakan nama view yang benar 'landing-page.news'
        return view('landing-page.news', compact('news', 'setting'));
    }

    /**
     * Menampilkan halaman detail satu berita.
     */
    public function show(News $news)
    {
        $setting = Setting::first();

        $otherNews = News::where('id', '!=', $news->id)
            ->latest('published_at')
            ->limit(5)
            ->get();

        return view('landing-page.news-detail', compact('news', 'setting', 'otherNews'));
    }
}
