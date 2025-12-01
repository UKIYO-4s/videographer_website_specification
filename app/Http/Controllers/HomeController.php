<?php

namespace App\Http\Controllers;

use App\Models\PricingPlan;
use App\Models\SiteSetting;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $videos = Video::published()->orderBy('display_order')->take(4)->get();
        $plans = PricingPlan::active()->orderBy('display_order')->get();
        $settings = SiteSetting::all()->pluck('value', 'key')->toArray();

        $design = $request->query('design', 'default');

        $viewMap = [
            'colorful' => 'home-colorful',
            'minimal' => 'home-minimal',
            'default' => 'home',
        ];

        $view = $viewMap[$design] ?? 'home';

        return view($view, compact('videos', 'plans', 'settings', 'design'));
    }

    public function demo()
    {
        return view('demo');
    }
}
