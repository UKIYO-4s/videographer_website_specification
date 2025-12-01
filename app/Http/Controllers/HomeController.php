<?php

namespace App\Http\Controllers;

use App\Models\PricingPlan;
use App\Models\SiteSetting;
use App\Models\Video;

class HomeController extends Controller
{
    public function index()
    {
        $videos = Video::published()->orderBy('display_order')->take(4)->get();
        $plans = PricingPlan::active()->orderBy('display_order')->get();
        $settings = SiteSetting::all()->pluck('value', 'key')->toArray();

        return view('home', compact('videos', 'plans', 'settings'));
    }
}
