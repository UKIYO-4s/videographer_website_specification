<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\PricingPlan;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $plans = PricingPlan::active()->orderBy('display_order')->get();

        $design = $request->query('design', 'default');

        $viewMap = [
            'colorful' => 'contact-colorful',
            'minimal' => 'contact-minimal',
            'videographer' => 'contact',
        ];

        $view = $viewMap[$design] ?? 'contact-colorful';

        return view($view, compact('plans', 'design'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'inquiry_type' => 'required|in:short,horizontal,shooting,other',
            'budget' => 'nullable|string|max:100',
            'message' => 'required|string|max:5000',
        ]);

        Contact::create($validated);

        return redirect()->route('contact.thanks');
    }

    public function thanks()
    {
        return view('contact-thanks');
    }
}
