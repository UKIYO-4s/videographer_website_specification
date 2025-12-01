<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'site_title' => 'Kei Uchida | Videographer',
            'site_description' => '内田敬 - 動画編集・撮影サービス。ショート動画、横動画、プロモーション動画の制作を承ります。',
            'owner_name' => '内田敬',
            'owner_name_en' => 'Kei Uchida',
            'profile_text' => '動画編集フリーランスとして活動しています。SNSショート動画から企業VP まで幅広く対応可能です。クリエイティブな映像で、あなたの想いを形にします。',
            'contact_email' => 'contact@example.com',
            'twitter_url' => '',
            'instagram_url' => '',
            'youtube_url' => '',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::set($key, $value);
        }
    }
}
