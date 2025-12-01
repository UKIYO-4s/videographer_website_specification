<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    public function run(): void
    {
        $videos = [
            [
                'title' => 'ショート動画サンプル1',
                'description' => 'プロモーション用ショート動画',
                'youtube_url' => 'https://youtube.com/shorts/b-owtXF70RU',
                'category' => 'short',
                'is_published' => true,
                'display_order' => 1,
            ],
            [
                'title' => 'ショート動画サンプル2',
                'description' => 'SNS向けショート動画',
                'youtube_url' => 'https://youtube.com/shorts/S5DNmiVGhiM',
                'category' => 'short',
                'is_published' => true,
                'display_order' => 2,
            ],
            [
                'title' => 'ショート動画サンプル3',
                'description' => 'ブランド紹介ショート動画',
                'youtube_url' => 'https://youtube.com/shorts/bBnJ_z3Vuss',
                'category' => 'short',
                'is_published' => true,
                'display_order' => 3,
            ],
            [
                'title' => 'ショート動画サンプル4',
                'description' => 'イベント告知ショート動画',
                'youtube_url' => 'https://youtube.com/shorts/QRsO03W7Svw',
                'category' => 'short',
                'is_published' => true,
                'display_order' => 4,
            ],
        ];

        foreach ($videos as $video) {
            Video::create($video);
        }
    }
}
