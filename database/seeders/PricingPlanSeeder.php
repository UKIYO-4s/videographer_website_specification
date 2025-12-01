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
                'description' => 'TikTok、Instagram Reels、YouTube Shorts向けの縦型ショート動画編集。月間100本以上の納品実績あり。',
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
                    '2回までの修正対応',
                ],
                'display_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'サムネイル作成',
                'price' => 10000,
                'unit' => '1枚',
                'description' => 'YouTube動画用のクリック率を高めるサムネイルデザイン',
                'features' => [
                    '高品質デザイン',
                    '訴求力のある構成',
                    '2回までの修正対応',
                ],
                'display_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => '撮影（4時間）',
                'price' => 50000,
                'unit' => '4時間まで',
                'description' => 'SONY FX-3を使用したプロフェッショナル撮影',
                'features' => [
                    'SONY FX-3使用',
                    'FE 24-70mm F2.8 GM II',
                    '4時間までの撮影',
                    'データ納品',
                    '延長: ¥15,000/時間',
                    '交通費別途',
                ],
                'display_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => '撮影（6時間セット）',
                'price' => 80000,
                'unit' => '6時間',
                'description' => 'SONY FX-3を使用したプロフェッショナル撮影（お得なセットプラン）',
                'features' => [
                    'SONY FX-3使用',
                    'FE 24-70mm F2.8 GM II',
                    '6時間までの撮影',
                    'データ納品',
                    '延長: ¥9,000/時間',
                    '交通費別途',
                ],
                'display_order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($plans as $plan) {
            PricingPlan::create($plan);
        }
    }
}
