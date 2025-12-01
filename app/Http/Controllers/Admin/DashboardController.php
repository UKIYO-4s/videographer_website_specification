<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Video;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_videos' => Video::count(),
            'published_videos' => Video::published()->count(),
            'pending_contacts' => Contact::pending()->count(),
            'total_contacts' => Contact::count(),
        ];

        $recentContacts = Contact::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentContacts'));
    }
}
