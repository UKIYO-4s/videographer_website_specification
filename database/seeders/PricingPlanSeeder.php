<?php

namespace Database\Seeders;

use App\Models\PricingPlan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PricingPlanSeeder extends Seeder
{
    public function run(): void
    {
        $plans = [
            [
                'name' => 'ショート動画（縦動画）',
                'price' => 18000,
                'unit' => '1本',
                'description' => 'TikTok、Instagram Reels、YouTube Shorts向けの縦型ショート動画編集',
                'features' => [
                    'カット編集',
                    'テロップ挿入',
                    'BGM・SE挿入',
                    'カラーグレーディング',
                    '2回までの修正対応',
                ],
                'display_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => '横動画',
                'price' => 60000,
                'unit' => '1本',
                'description' => 'YouTube、企業VP向けの横型動画編集',
                'features' => [
                    'カット編集',
                    'テロップ挿入',
                    'BGM・SE挿入',
                    'カラーグレーディング',
                    'モーショングラフィックス',
                    'サムネイル作成',
                    '3回までの修正対応',
                ],
                'display_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => '撮影',
                'price' => 50000,
                'unit' => '1日',
                'description' => 'SONY FX-3を使用したプロフェッショナル撮影',
                'features' => [
                    'SONY FX-3使用',
                    'FE 24-70mm F2.8 GM II',
                    '最大8時間撮影',
                    'データ納品',
                    '交通費別途',
                ],
                'display_order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($plans as $plan) {
            PricingPlan::create($plan);
        }
    }
}
