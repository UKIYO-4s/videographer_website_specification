<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\PricingPlan;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $plans = PricingPlan::active()->orderBy('display_order')->get();

        return view('contact', compact('plans'));
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
