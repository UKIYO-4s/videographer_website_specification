@extends('layouts.public-colorful')

@section('title', '実績 | ' . \App\Models\SiteSetting::get('site_title', 'Takashi Uchida'))

@section('content')
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <div class="glass-card inline-block px-6 py-2 rounded-full mb-6">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-orange-500 font-bold text-sm">
                        PORTFOLIO
                    </span>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">実績・作品集</h1>
                <p class="text-gray-600">月間100本以上のショート動画納品実績</p>
            </div>

            <!-- Filter -->
            <div class="flex justify-center gap-3 mb-12 flex-wrap">
                <a href="{{ route('gallery') }}?design=colorful" class="px-6 py-3 rounded-full font-bold transition transform hover:scale-105 shadow-lg {{ !$category ? 'bg-gradient-to-r from-pink-500 via-orange-500 to-yellow-500 text-white' : 'glass-card text-gray-700 hover:shadow-xl' }}">
                    すべて
                </a>
                <a href="{{ route('gallery', ['category' => 'short']) }}?design=colorful" class="px-6 py-3 rounded-full font-bold transition transform hover:scale-105 shadow-lg {{ $category === 'short' ? 'bg-gradient-to-r from-pink-500 via-orange-500 to-yellow-500 text-white' : 'glass-card text-gray-700 hover:shadow-xl' }}">
                    ショート動画
                </a>
                <a href="{{ route('gallery', ['category' => 'horizontal']) }}?design=colorful" class="px-6 py-3 rounded-full font-bold transition transform hover:scale-105 shadow-lg {{ $category === 'horizontal' ? 'bg-gradient-to-r from-pink-500 via-orange-500 to-yellow-500 text-white' : 'glass-card text-gray-700 hover:shadow-xl' }}">
                    横動画
                </a>
            </div>

            <!-- Videos Grid -->
            @if($videos->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                    @foreach($videos as $video)
                        <a href="{{ $video->youtube_url }}" target="_blank" rel="noopener noreferrer" class="group relative aspect-[9/16] glass-card rounded-3xl overflow-hidden hover:scale-105 transition duration-300 shadow-lg hover:shadow-2xl">
                            @if($video->thumbnail)
                                <img src="{{ Storage::url($video->thumbnail) }}" alt="{{ $video->title }}" class="w-full h-full object-cover">
                            @else
                                <img src="https://img.youtube.com/vi/{{ $video->youtube_id }}/maxresdefault.jpg" alt="{{ $video->title }}" class="w-full h-full object-cover" onerror="this.src='https://img.youtube.com/vi/{{ $video->youtube_id }}/hqdefault.jpg'">
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition">
                                <div class="absolute bottom-4 left-4 right-4">
                                    <p class="text-sm font-bold text-white mb-1">{{ $video->title }}</p>
                                    @if($video->description)
                                        <p class="text-xs text-gray-200 line-clamp-2">{{ $video->description }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                                <div class="w-16 h-16 bg-gradient-to-r from-pink-500 to-orange-500 rounded-full flex items-center justify-center shadow-lg">
                                    <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="absolute top-3 right-3">
                                <span class="px-3 py-1 text-xs font-bold bg-gradient-to-r from-pink-500 to-orange-500 rounded-full text-white shadow-lg">
                                    {{ $video->category === 'short' ? 'Short' : 'Horizontal' }}
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="text-center py-16">
                    <div class="glass-card inline-block px-12 py-8 rounded-3xl">
                        <p class="text-gray-600 text-lg">該当する動画がありません</p>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="glass-card rounded-3xl p-12 text-center shadow-2xl">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">動画制作のご依頼</h2>
                <p class="text-gray-600 mb-8">
                    あなたのプロジェクトに合わせた動画を制作いたします
                </p>
                <a href="{{ route('contact') }}?design=colorful" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-pink-500 via-orange-500 to-yellow-500 rounded-full text-white font-bold shadow-lg hover:shadow-xl transform hover:scale-105 transition">
                    お問い合わせ
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>
@endsection
