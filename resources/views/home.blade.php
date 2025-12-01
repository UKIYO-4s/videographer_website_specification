@extends('layouts.public')

@section('title', $settings['site_title'] ?? 'Takashi Uchida | Videographer')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-purple-900/50 via-gray-900 to-pink-900/50"></div>
        <div class="absolute inset-0">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-purple-600/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-pink-600/20 rounded-full blur-3xl animate-pulse delay-1000"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-purple-400 via-pink-400 to-purple-400">
                    {{ $settings['owner_name_en'] ?? 'Takashi Uchida' }}
                </span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 mb-4">
                {{ $settings['owner_name'] ?? '内田敬' }}
            </p>
            <p class="text-lg md:text-xl text-gray-400 mb-8 max-w-2xl mx-auto">
                Videographer / Video Editor
            </p>
            <p class="text-gray-400 mb-12 max-w-2xl mx-auto">
                {{ $settings['profile_text'] ?? 'プロフェッショナルな動画編集・撮影サービスを提供しています' }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('gallery') }}" class="px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full text-white font-semibold hover:from-purple-700 hover:to-pink-700 transition transform hover:scale-105">
                    実績を見る
                </a>
                <a href="{{ route('contact') }}" class="px-8 py-4 border-2 border-purple-500 rounded-full text-white font-semibold hover:bg-purple-500/20 transition">
                    お問い合わせ
                </a>
            </div>
        </div>

        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-24 bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">About</h2>
                <p class="text-gray-400">サービス紹介</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gray-800/50 rounded-2xl p-8 hover:bg-gray-800 transition group">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">ショート動画</h3>
                    <p class="text-gray-400">TikTok、Instagram Reels、YouTube Shorts向けの縦型ショート動画を制作します。</p>
                </div>

                <div class="bg-gray-800/50 rounded-2xl p-8 hover:bg-gray-800 transition group">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">横動画</h3>
                    <p class="text-gray-400">YouTube動画や企業VP、プロモーション動画など、横型動画の編集を行います。</p>
                </div>

                <div class="bg-gray-800/50 rounded-2xl p-8 hover:bg-gray-800 transition group">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">撮影</h3>
                    <p class="text-gray-400">SONY FX-3を使用したプロフェッショナルな撮影サービスを提供します。</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Works Section -->
    <section class="py-24 bg-gray-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Works</h2>
                <p class="text-gray-400">最新の実績</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
                @foreach($videos as $video)
                    <a href="{{ $video->youtube_url }}" target="_blank" rel="noopener noreferrer" class="group relative aspect-[9/16] bg-gray-800 rounded-2xl overflow-hidden hover:scale-105 transition duration-300">
                        @if($video->thumbnail)
                            <img src="{{ Storage::url($video->thumbnail) }}" alt="{{ $video->title }}" class="w-full h-full object-cover">
                        @else
                            <img src="https://img.youtube.com/vi/{{ $video->youtube_id }}/maxresdefault.jpg" alt="{{ $video->title }}" class="w-full h-full object-cover" onerror="this.src='https://img.youtube.com/vi/{{ $video->youtube_id }}/hqdefault.jpg'">
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition">
                            <div class="absolute bottom-4 left-4 right-4">
                                <p class="text-sm font-medium text-white">{{ $video->title }}</p>
                            </div>
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                            <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center">
                                <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('gallery') }}" class="inline-flex items-center px-6 py-3 border-2 border-purple-500 rounded-full text-purple-400 font-semibold hover:bg-purple-500/20 transition">
                    すべての実績を見る
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="py-24 bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Pricing</h2>
                <p class="text-gray-400">料金プラン</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach($plans as $plan)
                    <div class="bg-gradient-to-b from-gray-800 to-gray-900 rounded-2xl p-8 border border-gray-700 hover:border-purple-500 transition">
                        <h3 class="text-xl font-bold mb-2">{{ $plan->name }}</h3>
                        <div class="flex items-baseline mb-6">
                            <span class="text-4xl font-bold text-purple-400">{{ $plan->formatted_price }}</span>
                            <span class="text-gray-400 ml-2">/ {{ $plan->unit }}</span>
                        </div>
                        <p class="text-gray-400 text-sm mb-6">{{ $plan->description }}</p>
                        @if($plan->features)
                            <ul class="space-y-3">
                                @foreach($plan->features as $feature)
                                    <li class="flex items-center text-sm text-gray-300">
                                        <svg class="w-5 h-5 text-purple-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

            <div class="text-center mt-12">
                <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full text-white font-semibold hover:from-purple-700 hover:to-pink-700 transition transform hover:scale-105">
                    お問い合わせはこちら
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 bg-gradient-to-r from-purple-900/50 to-pink-900/50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">お気軽にご相談ください</h2>
            <p class="text-gray-300 mb-8">
                動画制作のご依頼・ご相談は下記よりお問い合わせください。<br>
                内容を確認後、24時間以内にご返信いたします。
            </p>
            <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full text-white font-semibold hover:from-purple-700 hover:to-pink-700 transition transform hover:scale-105">
                お問い合わせはこちら
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </section>
@endsection
