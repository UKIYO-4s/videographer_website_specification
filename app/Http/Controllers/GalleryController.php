<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = Video::published()->orderBy('display_order');

        if ($request->filled('category') && in_array($request->category, ['short', 'horizontal'])) {
            $query->where('category', $request->category);
        }

        $videos = $query->get();
        $category = $request->category;

        $design = $request->query('design', 'default');

        $viewMap = [
            'colorful' => 'gallery-colorful',
            'minimal' => 'gallery-minimal',
            'videographer' => 'gallery',
        ];

        $view = $viewMap[$design] ?? 'gallery-colorful';

        return view($view, compact('videos', 'category', 'design'));
    }
}
