@extends('layouts.public')

@section('title', '料金プラン | ' . \App\Models\SiteSetting::get('site_title', 'Kei Uchida'))

@section('content')
    <section class="py-24 bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Pricing</h1>
                <p class="text-gray-400">料金プラン</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                @foreach($plans as $index => $plan)
                    <div class="relative bg-gradient-to-b from-gray-800 to-gray-900 rounded-2xl p-8 border border-gray-700 hover:border-purple-500 transition {{ $index === 1 ? 'md:scale-105 border-purple-500' : '' }}">
                        @if($index === 1)
                            <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                                <span class="px-4 py-1 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full text-sm font-semibold">人気</span>
                            </div>
                        @endif
                        <h3 class="text-xl font-bold mb-2">{{ $plan->name }}</h3>
                        <div class="flex items-baseline mb-6">
                            <span class="text-4xl font-bold text-purple-400">{{ $plan->formatted_price }}</span>
                            <span class="text-gray-400 ml-2">/ {{ $plan->unit }}</span>
                        </div>
                        <p class="text-gray-400 text-sm mb-6">{{ $plan->description }}</p>
                        @if($plan->features)
                            <ul class="space-y-3 mb-8">
                                @foreach($plan->features as $feature)
                                    <li class="flex items-start text-sm text-gray-300">
                                        <svg class="w-5 h-5 text-purple-400 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        {{ $feature }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        <a href="{{ route('contact') }}" class="block text-center py-3 {{ $index === 1 ? 'bg-gradient-to-r from-purple-600 to-pink-600 text-white' : 'border-2 border-purple-500 text-purple-400 hover:bg-purple-500 hover:text-white' }} rounded-full font-semibold transition">
                            お問い合わせ
                        </a>
                    </div>
                @endforeach
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
