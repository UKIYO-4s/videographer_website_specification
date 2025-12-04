@extends('layouts.public-minimal')

@section('title', '料金プラン | ' . \App\Models\SiteSetting::get('site_title', 'Takashi Uchita'))

@section('content')
    <section class="py-24">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-16">
                <p class="text-gray-500 tracking-widest text-sm mb-4">PRICING</p>
                <h1 class="text-5xl font-light text-gray-900">料金プラン</h1>
                <div class="w-16 h-0.5 bg-black mt-8"></div>
            </div>

            <!-- Highlight -->
            <div class="mb-16">
                <p class="text-gray-600">月間100本以上の納品実績</p>
            </div>

            @php
                $categoryOrder = ['編集', '撮影', 'デザイン', 'SNS運用'];
            @endphp

            @foreach($categoryOrder as $category)
                @if(isset($plansByCategory[$category]))
                    <div class="mb-20">
                        <div class="mb-10">
                            <span class="text-gray-400 tracking-widest text-sm">{{ strtoupper($category) }}</span>
                            <h2 class="text-2xl font-light text-gray-900 mt-2">{{ $category }}</h2>
                            <div class="w-8 h-0.5 bg-black mt-4"></div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-8">
                            @foreach($plansByCategory[$category] as $plan)
                                <div class="group border border-gray-200 p-8 hover:border-black transition duration-300">
                                    <div class="flex justify-between items-start mb-6">
                                        <h3 class="text-xl font-medium text-gray-900">{{ $plan->name }}</h3>
                                        <div class="text-right">
                                            <span class="text-3xl font-light text-gray-900">{{ $plan->formatted_price }}</span>
                                            <span class="text-gray-500 text-sm ml-1">/ {{ $plan->unit }}</span>
                                        </div>
                                    </div>
                                    <p class="text-gray-600 text-sm mb-6">{{ $plan->description }}</p>
                                    @if($plan->features)
                                        <ul class="space-y-3">
                                            @foreach($plan->features as $feature)
                                                <li class="flex items-start text-sm text-gray-600">
                                                    <span class="w-1.5 h-1.5 bg-black rounded-full mr-3 mt-2 flex-shrink-0"></span>
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

            <!-- Single CTA -->
            <div class="text-center mt-16">
                <a href="{{ route('contact') }}?design=minimal" class="inline-block px-12 py-4 bg-black text-white font-medium hover:bg-gray-800 transition">
                    Contact for Quote
                </a>
            </div>
        </div>
    </section>

    <!-- Equipment Section -->
    <section class="py-24 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-16">
                <p class="text-gray-500 tracking-widest text-sm mb-4">EQUIPMENT</p>
                <h2 class="text-4xl font-light text-gray-900">撮影機材</h2>
            </div>

            <div class="grid md:grid-cols-2 gap-12">
                <div class="group">
                    <p class="text-gray-400 tracking-widest text-xs mb-4">CAMERA</p>
                    <h3 class="text-2xl font-medium text-gray-900 mb-4">SONY FX-3</h3>
                    <p class="text-gray-600 leading-relaxed mb-6">シネマティックな映像を撮影できるフルサイズセンサー搭載のシネマカメラ。</p>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-black rounded-full mr-3"></span>
                            フルサイズセンサー
                        </li>
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-black rounded-full mr-3"></span>
                            4K 120fps対応
                        </li>
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-black rounded-full mr-3"></span>
                            S-Cinetone搭載
                        </li>
                    </ul>
                </div>

                <div class="group">
                    <p class="text-gray-400 tracking-widest text-xs mb-4">LENS</p>
                    <h3 class="text-2xl font-medium text-gray-900 mb-4">FE 24-70mm F2.8 GM II</h3>
                    <p class="text-gray-600 leading-relaxed mb-6">ソニー最高峰Gマスターシリーズの標準ズームレンズ。</p>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-black rounded-full mr-3"></span>
                            F2.8通しの明るさ
                        </li>
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-black rounded-full mr-3"></span>
                            高速・高精度AF
                        </li>
                        <li class="flex items-center">
                            <span class="w-1.5 h-1.5 bg-black rounded-full mr-3"></span>
                            防塵防滴設計
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Notes Section -->
    <section class="py-24">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-12">
                <p class="text-gray-500 tracking-widest text-sm mb-4">NOTES</p>
                <h2 class="text-2xl font-light text-gray-900">ご注意事項</h2>
            </div>
            <ul class="space-y-4 text-gray-600">
                <li class="flex items-start">
                    <span class="text-gray-400 mr-4">*</span>
                    上記料金は目安となります。動画の長さや内容により変動する場合があります。
                </li>
                <li class="flex items-start">
                    <span class="text-gray-400 mr-4">*</span>
                    撮影サービスには交通費が別途かかります。
                </li>
                <li class="flex items-start">
                    <span class="text-gray-400 mr-4">*</span>
                    お見積りは無料です。お気軽にお問い合わせください。
                </li>
                <li class="flex items-start">
                    <span class="text-gray-400 mr-4">*</span>
                    納期は内容により異なりますが、通常1週間〜2週間程度です。
                </li>
            </ul>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 bg-gray-900 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-gray-500 tracking-widest text-sm mb-4">FREE ESTIMATE</p>
            <h2 class="text-4xl font-light mb-8">お見積り無料</h2>
            <p class="text-gray-400 mb-12 leading-relaxed">
                プロジェクトの詳細をお聞かせください。<br>
                最適なプランをご提案いたします。
            </p>
            <a href="{{ route('contact') }}?design=minimal" class="inline-block px-12 py-4 bg-white text-gray-900 font-medium hover:bg-gray-100 transition">
                Contact Me
            </a>
        </div>
    </section>
@endsection
