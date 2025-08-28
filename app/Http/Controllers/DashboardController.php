<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Member;
use App\Models\News;
use App\Models\Program;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Tampilkan halaman dashboard utama dengan data ringkasan.
     */
    public function index()
    {
        $totalMembers = Member::count();
        $totalPrograms = Program::count();
        $totalContacts = Contact::count();
        $totalNews = News::count();

        return view('dashboard', compact('totalMembers', 'totalPrograms', 'totalContacts', 'totalNews'));
    }
}
