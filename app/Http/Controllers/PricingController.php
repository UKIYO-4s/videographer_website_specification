<?php

namespace App\Http\Controllers;

use App\Models\PricingPlan;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index(Request $request)
    {
        $plans = PricingPlan::active()->orderBy('display_order')->get();
        $plansByCategory = $plans->groupBy('category');

        $design = $request->query('design', 'default');

        $viewMap = [
            'colorful' => 'pricing-colorful',
            'minimal' => 'pricing-minimal',
            'videographer' => 'pricing',
        ];

        $view = $viewMap[$design] ?? 'pricing-colorful';

        return view($view, compact('plans', 'plansByCategory', 'design'));
    }
}
