<?php

namespace App\Http\Controllers;

use App\Models\PricingPlan;

class PricingController extends Controller
{
    public function index()
    {
        $plans = PricingPlan::active()->orderBy('display_order')->get();

        return view('pricing', compact('plans'));
    }
}
