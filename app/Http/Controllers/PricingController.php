<?php

namespace App\Http\Controllers;

use App\Models\PricingPlan;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index(Request $request)
    {
        $plans = PricingPlan::active()->orderBy('display_order')->get();

        $design = $request->query('design', 'default');

        $viewMap = [
            'colorful' => 'pricing-colorful',
            'minimal' => 'pricing-minimal',
            'default' => 'pricing',
        ];

        $view = $viewMap[$design] ?? 'pricing';

        return view($view, compact('plans', 'design'));
    }
}
