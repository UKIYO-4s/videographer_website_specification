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
            // 編集カテゴリ
            [
                'name' => 'ショート動画（縦動画）',
                'category' => '編集',
                'price' => 18000,
                'unit' => '1本',
                'description' => 'TikTok、Instagram Reels、YouTube Shorts向けの縦型ショート動画編集。月間100本以上の納品実績あり。',
                'features' => [
                    '素材尺15分未満',
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
                'category' => '編集',
                'price' => 60000,
                'unit' => '1本',
                'description' => 'YouTube、企業VP向けの横型動画編集',
                'features' => [
                    '素材尺30分未満',
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
            // 撮影カテゴリ
            [
                'name' => '撮影（4時間）',
                'category' => '撮影',
                'price' => 60000,
                'unit' => '4時間',
                'description' => 'SONY FX-3を使用したプロフェッショナル撮影（¥15,000/時間）',
                'features' => [
                    'SONY FX-3使用',
                    'FE 24-70mm F2.8 GM II',
                    '4時間までの撮影',
                    'データ納品',
                    '延長: ¥15,000/時間',
                    '交通費別途',
                ],
                'display_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => '撮影（6時間セット）',
                'category' => '撮影',
                'price' => 70000,
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
                'display_order' => 4,
                'is_active' => true,
            ],
            // デザインカテゴリ
            [
                'name' => 'サムネイル作成',
                'category' => 'デザイン',
                'price' => 10000,
                'unit' => '1枚',
                'description' => 'YouTube動画用のクリック率を高めるサムネイルデザイン',
                'features' => [
                    '高品質デザイン',
                    '訴求力のある構成',
                    '2回までの修正対応',
                ],
                'display_order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'YouTube初期構築',
                'category' => 'デザイン',
                'price' => 150000,
                'unit' => '1チャンネル',
                'description' => 'YouTubeチャンネルの初期設定・ブランディング構築',
                'features' => [
                    'チャンネルアート作成',
                    'アイコン作成',
                    'チャンネル説明文作成',
                    '再生リスト設計',
                    '初期設定サポート',
                ],
                'display_order' => 6,
                'is_active' => true,
            ],
            // SNS運用カテゴリ
            [
                'name' => 'YouTube運用',
                'category' => 'SNS運用',
                'price' => 0,
                'unit' => '要相談',
                'description' => 'YouTubeチャンネルの運用代行・コンサルティング',
                'features' => [
                    '投稿スケジュール管理',
                    'サムネイル作成',
                    'SEO対策',
                    '分析レポート',
                    '月1回ミーティング',
                ],
                'display_order' => 7,
                'is_active' => true,
            ],
            [
                'name' => 'Instagram運用',
                'category' => 'SNS運用',
                'price' => 0,
                'unit' => '要相談',
                'description' => 'Instagramアカウントの運用代行・コンサルティング',
                'features' => [
                    '投稿スケジュール管理',
                    'リール動画制作',
                    'ストーリーズ運用',
                    '分析レポート',
                    '月1回ミーティング',
                ],
                'display_order' => 8,
                'is_active' => true,
            ],
        ];

        foreach ($plans as $plan) {
            PricingPlan::create($plan);
        }
    }
}
