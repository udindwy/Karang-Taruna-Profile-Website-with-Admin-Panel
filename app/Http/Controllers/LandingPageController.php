<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Member;
use App\Models\Gallery;
use App\Models\Program;
use App\Models\Setting;
use App\Models\HeroSection;
use App\Models\AboutSection;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $heroSection = HeroSection::first();
        $aboutSection = AboutSection::first();
        $members = Member::orderBy('id', 'asc')->get();

        $galleries = Gallery::latest()->limit(3)->get();

        $news = News::latest('published_at')->limit(3)->get();

        $programs = Program::with('category')
            ->latest()
            ->limit(3)
            ->get();


        return view('landing-page.index', compact('setting', 'heroSection', 'aboutSection', 'members', 'programs', 'galleries', 'news'));
    }

    public function showProgram(Program $program)
    {
        $setting = Setting::first();

        $otherPrograms = Program::where('id', '!=', $program->id)
            ->latest()
            ->limit(5)
            ->get();

        return view('landing-page.program-detail', compact('setting', 'program', 'otherPrograms'));
    }
}
