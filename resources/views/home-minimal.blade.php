@extends('layouts.public-minimal')

@section('title', $settings['site_title'] ?? 'Takashi Uchita | Videographer')

@section('content')
    <!-- Hero Section -->
    <section class="min-h-screen flex items-center">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <p class="text-gray-500 tracking-widest text-sm mb-4">VIDEOGRAPHER</p>
                    <h1 class="text-5xl md:text-7xl font-light tracking-tight text-gray-900 mb-6">
                        {{ $settings['owner_name_en'] ?? 'Takashi Uchita' }}
                    </h1>
                    <p class="text-xl text-gray-600 mb-2">{{ $settings['owner_name'] ?? '内田敬' }}</p>
                    <div class="w-16 h-0.5 bg-black my-8"></div>
                    <p class="text-gray-600 leading-relaxed mb-8 max-w-md">
                        {{ $settings['profile_text'] ?? 'ショート動画を得意とするビデオグラファー。月間100本以上の納品実績。' }}
                    </p>
                    <div class="flex gap-4">
                        <a href="{{ route('gallery') }}?design=minimal" class="px-8 py-4 bg-black text-white font-medium hover:bg-gray-800 transition">
                            View Works
                        </a>
                        <a href="{{ route('contact') }}?design=minimal" class="px-8 py-4 border border-gray-300 text-gray-700 font-medium hover:border-black transition">
                            Contact
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <div class="aspect-[4/5] bg-gray-100 overflow-hidden">
                        <div class="w-full h-full bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                            <div class="text-center">
                                <p class="text-6xl font-light text-gray-400">100+</p>
                                <p class="text-gray-500 mt-2">Monthly Deliveries</p>
                            </div>
                        </div>
                    </div>
                    <div class="absolute -bottom-4 -left-4 w-32 h-32 border border-gray-200"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-24 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-16">
                <p class="text-gray-500 tracking-widest text-sm mb-4">SERVICES</p>
                <h2 class="text-4xl font-light text-gray-900">What I Do</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-12">
                <div class="group">
                    <div class="mb-6">
                        <span class="text-5xl font-light text-gray-300 group-hover:text-black transition">01</span>
                    </div>
                    <h3 class="text-xl font-medium text-gray-900 mb-4">Short Videos</h3>
                    <p class="text-gray-600 leading-relaxed">TikTok、Instagram Reels、YouTube Shorts向けのショート動画制作。月間100本以上の納品実績。</p>
                    <div class="w-8 h-0.5 bg-black mt-6 opacity-0 group-hover:opacity-100 transition"></div>
                </div>

                <div class="group">
                    <div class="mb-6">
                        <span class="text-5xl font-light text-gray-300 group-hover:text-black transition">02</span>
                    </div>
                    <h3 class="text-xl font-medium text-gray-900 mb-4">Horizontal Videos</h3>
                    <p class="text-gray-600 leading-relaxed">YouTube動画、企業VP、プロモーション動画の編集。高品質な映像作品を制作。</p>
                    <div class="w-8 h-0.5 bg-black mt-6 opacity-0 group-hover:opacity-100 transition"></div>
                </div>

                <div class="group">
                    <div class="mb-6">
                        <span class="text-5xl font-light text-gray-300 group-hover:text-black transition">03</span>
                    </div>
                    <h3 class="text-xl font-medium text-gray-900 mb-4">Shooting</h3>
                    <p class="text-gray-600 leading-relaxed">SONY FX-3によるプロフェッショナルな撮影。シネマティックな映像を提供。</p>
                    <div class="w-8 h-0.5 bg-black mt-6 opacity-0 group-hover:opacity-100 transition"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Works Section -->
    <section class="py-24">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-16">
                <div>
                    <p class="text-gray-500 tracking-widest text-sm mb-4">PORTFOLIO</p>
                    <h2 class="text-4xl font-light text-gray-900">Selected Works</h2>
                </div>
                <a href="{{ route('gallery') }}?design=minimal" class="text-gray-600 hover:text-black transition flex items-center">
                    View All
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach($videos as $video)
                    <a href="{{ $video->youtube_url }}" target="_blank" rel="noopener noreferrer" class="group relative aspect-[9/16] bg-gray-100 overflow-hidden">
                        @if($video->thumbnail)
                            <img src="{{ Storage::url($video->thumbnail) }}" alt="{{ $video->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        @else
                            <img src="https://img.youtube.com/vi/{{ $video->youtube_id }}/maxresdefault.jpg" alt="{{ $video->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" onerror="this.src='https://img.youtube.com/vi/{{ $video->youtube_id }}/hqdefault.jpg'">
                        @endif
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition duration-300 flex items-center justify-center">
                            <div class="w-12 h-12 border-2 border-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                                <svg class="w-5 h-5 text-white ml-0.5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 bg-gray-900 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-gray-500 tracking-widest text-sm mb-4">GET IN TOUCH</p>
            <h2 class="text-4xl md:text-5xl font-light mb-8">Let's Work Together</h2>
            <p class="text-gray-400 mb-12 max-w-2xl mx-auto leading-relaxed">
                動画制作のご依頼・ご相談はお気軽にどうぞ。<br>
                お見積りは無料です。
            </p>
            <a href="{{ route('contact') }}?design=minimal" class="inline-block px-12 py-4 bg-white text-gray-900 font-medium hover:bg-gray-100 transition">
                Contact Me
            </a>
        </div>
    </section>
@endsection
