<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Setting;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        $programs = Program::with('category')->latest()->paginate(9);

        return view('landing-page.programs', compact('programs', 'setting'));
    }
}
