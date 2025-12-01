<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function edit()
    {
        $settings = SiteSetting::all()->pluck('value', 'key')->toArray();

        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_title' => 'nullable|string|max:255',
            'site_description' => 'nullable|string',
            'owner_name' => 'nullable|string|max:255',
            'owner_name_en' => 'nullable|string|max:255',
            'profile_text' => 'nullable|string',
            'contact_email' => 'nullable|email|max:255',
            'twitter_url' => 'nullable|url|max:500',
            'instagram_url' => 'nullable|url|max:500',
            'youtube_url' => 'nullable|url|max:500',
        ]);

        $keys = [
            'site_title', 'site_description', 'owner_name', 'owner_name_en',
            'profile_text', 'contact_email', 'twitter_url', 'instagram_url', 'youtube_url'
        ];

        foreach ($keys as $key) {
            SiteSetting::set($key, $request->input($key, ''));
        }

        return redirect()->back()->with('success', '設定を保存しました');
    }
}
