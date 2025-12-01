<?php

namespace App\Http\Controllers;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipment = [
            [
                'name' => 'SONY FX-3',
                'type' => 'カメラ',
                'description' => 'シネマティックな映像を撮影できるフルサイズセンサー搭載のシネマカメラ。4K 120fps撮影対応で、滑らかなスローモーション映像も可能。',
                'features' => [
                    'フルサイズセンサー',
                    '4K 120fps対応',
                    'S-Cinetone搭載',
                    '5軸手ブレ補正',
                    '優れた低照度性能',
                ],
            ],
            [
                'name' => 'FE 24-70mm F2.8 GM II',
                'type' => 'レンズ',
                'description' => 'ソニーの最高峰Gマスターシリーズの標準ズームレンズ。圧倒的な解像力と美しいボケ味を実現。',
                'features' => [
                    'F2.8通しの明るさ',
                    '高速・高精度AF',
                    '軽量コンパクト設計',
                    '防塵防滴設計',
                    '11枚羽根円形絞り',
                ],
            ],
        ];

        return view('equipment', compact('equipment'));
    }
}
