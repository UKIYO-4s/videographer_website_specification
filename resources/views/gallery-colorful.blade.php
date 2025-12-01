@extends('layouts.public-colorful')

@section('title', '実績 | ' . \App\Models\SiteSetting::get('site_title', 'Takashi Uchida'))

@section('content')
    <section class="py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="gradient-text font-bold text-sm tracking-wider">PORTFOLIO</span>
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mt-2">実績・作品集</h1>
                <p class="text-gray-500 mt-4">月間100本以上のショート動画納品実績</p>
            </div>

            <!-- Filter -->
            <div class="flex justify-center gap-3 mb-12 flex-wrap">
                <a href="{{ route('gallery') }}?design=colorful" class="px-6 py-3 rounded-full font-bold transition {{ !$category ? 'gradient-accent text-white shadow-lg shadow-pink-500/25' : 'bg-white text-gray-700 border border-gray-200 hover:border-pink-300' }}">
                    すべて
                </a>
                <a href="{{ route('gallery', ['category' => 'short']) }}?design=colorful" class="px-6 py-3 rounded-full font-bold transition {{ $category === 'short' ? 'gradient-accent text-white shadow-lg shadow-pink-500/25' : 'bg-white text-gray-700 border border-gray-200 hover:border-pink-300' }}">
                    ショート動画
                </a>
                <a href="{{ route('gallery', ['category' => 'horizontal']) }}?design=colorful" class="px-6 py-3 rounded-full font-bold transition {{ $category === 'horizontal' ? 'gradient-accent text-white shadow-lg shadow-pink-500/25' : 'bg-white text-gray-700 border border-gray-200 hover:border-pink-300' }}">
                    横動画
                </a>
            </div>

            <!-- Videos Grid -->
            @if($videos->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                    @foreach($videos as $video)
                        <a href="{{ $video->youtube_url }}" target="_blank" rel="noopener noreferrer" class="group relative aspect-[9/16] bg-gray-100 rounded-2xl overflow-hidden hover:shadow-2xl hover:shadow-pink-500/10 transition duration-300">
                            @if($video->thumbnail)
                                <img src="{{ Storage::url($video->thumbnail) }}" alt="{{ $video->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            @else
                                <img src="https://img.youtube.com/vi/{{ $video->youtube_id }}/maxresdefault.jpg" alt="{{ $video->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" onerror="this.src='https://img.youtube.com/vi/{{ $video->youtube_id }}/hqdefault.jpg'">
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition">
                                <div class="absolute bottom-4 left-4 right-4">
                                    <p class="text-sm font-bold text-white mb-1">{{ $video->title }}</p>
                                    @if($video->description)
                                        <p class="text-xs text-gray-200 line-clamp-2">{{ $video->description }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                                <div class="w-14 h-14 gradient-accent rounded-full flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="absolute top-3 right-3">
                                <span class="px-3 py-1 text-xs font-bold gradient-accent rounded-full text-white">
                                    {{ $video->category === 'short' ? 'Short' : 'Horizontal' }}
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="text-center py-16">
                    <div class="inline-block px-12 py-8 bg-white rounded-2xl border border-gray-100">
                        <p class="text-gray-500 text-lg">該当する動画がありません</p>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative gradient-accent rounded-3xl p-12 text-center overflow-hidden">
                <div class="absolute top-0 left-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
                <div class="absolute bottom-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl translate-x-1/2 translate-y-1/2"></div>
                <div class="relative">
                    <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">動画制作のご依頼</h2>
                    <p class="text-white/90 mb-8">
                        あなたのプロジェクトに合わせた動画を制作いたします
                    </p>
                    <a href="{{ route('contact') }}?design=colorful" class="inline-flex items-center px-8 py-4 bg-white rounded-full text-pink-600 font-bold shadow-lg hover:shadow-xl transform hover:scale-105 transition">
                        お問い合わせ
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
