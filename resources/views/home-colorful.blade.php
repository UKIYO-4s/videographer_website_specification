@extends('layouts.public-colorful')

@section('title', $settings['site_title'] ?? 'Takashi Uchida | Videographer')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="text-center lg:text-left">
                    <div class="glass-card inline-block px-4 py-2 rounded-full mb-6">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-orange-500 font-bold">
                            月間100本以上の納品実績
                        </span>
                    </div>
                    <h1 class="text-4xl md:text-6xl font-bold text-gray-800 mb-4">
                        {{ $settings['owner_name_en'] ?? 'Takashi Uchida' }}
                    </h1>
                    <p class="text-xl text-gray-600 mb-2">{{ $settings['owner_name'] ?? '内田敬' }}</p>
                    <p class="text-lg text-gray-500 mb-6">Videographer / Video Editor</p>
                    <p class="text-gray-600 mb-8 max-w-lg">
                        {{ $settings['profile_text'] ?? 'ショート動画を得意とするビデオグラファー。SNS向けの縦動画から企業VPまで幅広く対応。' }}
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="{{ route('gallery') }}?design=colorful" class="px-8 py-4 bg-gradient-to-r from-pink-500 via-orange-500 to-yellow-500 rounded-full text-white font-bold shadow-lg hover:shadow-xl transform hover:scale-105 transition">
                            実績を見る
                        </a>
                        <a href="{{ route('contact') }}?design=colorful" class="px-8 py-4 glass-card rounded-full text-gray-700 font-bold hover:bg-white transition">
                            お問い合わせ
                        </a>
                    </div>
                </div>
                <div class="flex justify-center">
                    <div class="phone-frame">
                        <div class="w-64 h-[500px] bg-gradient-to-br from-pink-400 via-purple-500 to-indigo-500 rounded-[32px] flex items-center justify-center relative overflow-hidden">
                            <div class="absolute inset-0 bg-black/20"></div>
                            <div class="relative z-10 text-white text-center p-6">
                                <div class="w-20 h-20 bg-white/30 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-10 h-10 ml-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                                <p class="font-bold text-lg">ショート動画</p>
                                <p class="text-sm opacity-80">TikTok / Reels / Shorts</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">サービス</h2>
                <p class="text-gray-600">幅広い動画制作に対応</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="glass-card rounded-3xl p-8 hover:shadow-2xl transition transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-r from-pink-500 to-orange-500 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <span class="inline-block px-3 py-1 bg-gradient-to-r from-pink-500 to-orange-500 text-white text-xs font-bold rounded-full mb-4">人気No.1</span>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">ショート動画</h3>
                    <p class="text-gray-600">TikTok、Instagram Reels、YouTube Shorts向けの縦型ショート動画を制作。月間100本以上の納品実績。</p>
                </div>

                <div class="glass-card rounded-3xl p-8 hover:shadow-2xl transition transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-yellow-500 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">横動画</h3>
                    <p class="text-gray-600">YouTube動画や企業VP、プロモーション動画など、横型動画の編集を行います。</p>
                </div>

                <div class="glass-card rounded-3xl p-8 hover:shadow-2xl transition transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-r from-yellow-500 to-pink-500 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">撮影</h3>
                    <p class="text-gray-600">SONY FX-3を使用したプロフェッショナルな撮影サービス。</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Works Section -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">実績</h2>
                <p class="text-gray-600">最新の制作事例</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
                @foreach($videos as $video)
                    <a href="{{ $video->youtube_url }}" target="_blank" rel="noopener noreferrer" class="group relative aspect-[9/16] glass-card rounded-3xl overflow-hidden hover:scale-105 transition duration-300 shadow-lg">
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
                            <div class="w-16 h-16 bg-gradient-to-r from-pink-500 to-orange-500 rounded-full flex items-center justify-center shadow-lg">
                                <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('gallery') }}?design=colorful" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-pink-500 via-orange-500 to-yellow-500 rounded-full text-white font-bold shadow-lg hover:shadow-xl transform hover:scale-105 transition">
                    すべての実績を見る
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="glass-card rounded-3xl p-12 text-center shadow-2xl">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">お気軽にご相談ください</h2>
                <p class="text-gray-600 mb-8">
                    動画制作のご依頼・ご相談は下記よりお問い合わせください。<br>
                    お見積りは無料です。
                </p>
                <a href="{{ route('contact') }}?design=colorful" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-pink-500 via-orange-500 to-yellow-500 rounded-full text-white font-bold shadow-lg hover:shadow-xl transform hover:scale-105 transition">
                    お問い合わせはこちら
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>
@endsection
