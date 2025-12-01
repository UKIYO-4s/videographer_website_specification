@extends('layouts.public')

@section('title', '料金プラン | ' . \App\Models\SiteSetting::get('site_title', 'Takashi Uchida'))

@section('content')
    <section class="py-24 bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Pricing</h1>
                <p class="text-gray-400">料金プラン</p>
            </div>

            <!-- Highlight: Short Videos -->
            <div class="mb-16">
                <div class="text-center mb-8">
                    <span class="inline-block px-4 py-2 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full text-sm font-semibold mb-4">月間100本以上の納品実績</span>
                    <h2 class="text-2xl font-bold">ショート動画が得意です</h2>
                </div>
            </div>

            @php
                $categoryIcons = [
                    '編集' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>',
                    '撮影' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>',
                    'デザイン' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>',
                    'SNS運用' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>',
                ];
                $categoryOrder = ['編集', '撮影', 'デザイン', 'SNS運用'];
            @endphp

            @foreach($categoryOrder as $category)
                @if(isset($plansByCategory[$category]))
                    <div class="mb-16">
                        <div class="flex items-center justify-center gap-3 mb-8">
                            <div class="w-10 h-10 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    {!! $categoryIcons[$category] ?? '' !!}
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold">{{ $category }}</h2>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6 max-w-4xl mx-auto">
                            @foreach($plansByCategory[$category] as $plan)
                                <div class="relative bg-gradient-to-b from-gray-800 to-gray-900 rounded-2xl p-8 border border-gray-700 hover:border-purple-500 transition">
                                    <h3 class="text-xl font-bold mb-2">{{ $plan->name }}</h3>
                                    <div class="flex items-baseline mb-4">
                                        <span class="text-3xl font-bold text-purple-400">{{ $plan->formatted_price }}</span>
                                        <span class="text-gray-400 ml-2">/ {{ $plan->unit }}</span>
                                    </div>
                                    <p class="text-gray-400 text-sm mb-4">{{ $plan->description }}</p>
                                    @if($plan->features)
                                        <ul class="space-y-2">
                                            @foreach($plan->features as $feature)
                                                <li class="flex items-start text-sm text-gray-300">
                                                    <svg class="w-4 h-4 text-purple-400 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                    </svg>
                                                    {{ $feature }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach

            <!-- Single CTA Button -->
            <div class="text-center mt-12">
                <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full text-white font-semibold hover:from-purple-700 hover:to-pink-700 transition transform hover:scale-105">
                    お問い合わせはこちら
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>

            <!-- Equipment Info for Shooting -->
            <div class="mt-24 max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold text-center mb-12">撮影機材</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="bg-gradient-to-b from-gray-800 to-gray-900 rounded-2xl p-8 border border-gray-700">
                        <span class="px-3 py-1 bg-purple-600/20 text-purple-400 rounded-full text-sm">カメラ</span>
                        <h3 class="text-2xl font-bold mt-4 mb-4">SONY FX-3</h3>
                        <p class="text-gray-400 text-sm mb-4">シネマティックな映像を撮影できるフルサイズセンサー搭載のシネマカメラ。4K 120fps撮影対応。</p>
                        <ul class="space-y-2 text-sm text-gray-300">
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-purple-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                フルサイズセンサー
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-purple-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                4K 120fps対応
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-purple-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                S-Cinetone搭載
                            </li>
                        </ul>
                    </div>
                    <div class="bg-gradient-to-b from-gray-800 to-gray-900 rounded-2xl p-8 border border-gray-700">
                        <span class="px-3 py-1 bg-purple-600/20 text-purple-400 rounded-full text-sm">レンズ</span>
                        <h3 class="text-2xl font-bold mt-4 mb-4">FE 24-70mm F2.8 GM II</h3>
                        <p class="text-gray-400 text-sm mb-4">ソニー最高峰Gマスターシリーズの標準ズームレンズ。圧倒的な解像力と美しいボケ味。</p>
                        <ul class="space-y-2 text-sm text-gray-300">
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-purple-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                F2.8通しの明るさ
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-purple-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                高速・高精度AF
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-purple-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                防塵防滴設計
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Notes -->
            <div class="mt-16 max-w-3xl mx-auto">
                <h3 class="text-xl font-bold mb-6 text-center">ご注意事項</h3>
                <div class="bg-gray-800/50 rounded-2xl p-8">
                    <ul class="space-y-3 text-gray-400 text-sm">
                        <li class="flex items-start">
                            <span class="text-purple-400 mr-2">*</span>
                            上記料金は目安となります。動画の長さや内容により変動する場合があります。
                        </li>
                        <li class="flex items-start">
                            <span class="text-purple-400 mr-2">*</span>
                            撮影サービスには交通費が別途かかります。
                        </li>
                        <li class="flex items-start">
                            <span class="text-purple-400 mr-2">*</span>
                            お見積りは無料です。お気軽にお問い合わせください。
                        </li>
                        <li class="flex items-start">
                            <span class="text-purple-400 mr-2">*</span>
                            納期は内容により異なりますが、通常1週間〜2週間程度です。
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-r from-purple-900/50 to-pink-900/50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl md:text-3xl font-bold mb-4">お見積り無料</h2>
            <p class="text-gray-300 mb-6">
                プロジェクトの詳細をお聞かせください。最適なプランをご提案いたします。
            </p>
            <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full text-white font-semibold hover:from-purple-700 hover:to-pink-700 transition">
                無料相談はこちら
            </a>
        </div>
    </section>
@endsection
