@extends('layouts.public')

@section('title', '実績 | ' . \App\Models\SiteSetting::get('site_title', 'Kei Uchida'))

@section('content')
    <section class="py-24 bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Works</h1>
                <p class="text-gray-400">制作実績</p>
            </div>

            <!-- Filter -->
            <div class="flex justify-center gap-4 mb-12">
                <a href="{{ route('gallery') }}" class="px-6 py-2 rounded-full transition {{ !$category ? 'bg-purple-600 text-white' : 'bg-gray-800 text-gray-400 hover:bg-gray-700' }}">
                    すべて
                </a>
                <a href="{{ route('gallery', ['category' => 'short']) }}" class="px-6 py-2 rounded-full transition {{ $category === 'short' ? 'bg-purple-600 text-white' : 'bg-gray-800 text-gray-400 hover:bg-gray-700' }}">
                    ショート動画
                </a>
                <a href="{{ route('gallery', ['category' => 'horizontal']) }}" class="px-6 py-2 rounded-full transition {{ $category === 'horizontal' ? 'bg-purple-600 text-white' : 'bg-gray-800 text-gray-400 hover:bg-gray-700' }}">
                    横動画
                </a>
            </div>

            <!-- Videos Grid -->
            @if($videos->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                    @foreach($videos as $video)
                        <a href="{{ $video->youtube_url }}" target="_blank" rel="noopener noreferrer" class="group relative aspect-[9/16] bg-gray-800 rounded-2xl overflow-hidden hover:scale-105 transition duration-300">
                            @if($video->thumbnail)
                                <img src="{{ Storage::url($video->thumbnail) }}" alt="{{ $video->title }}" class="w-full h-full object-cover">
                            @else
                                <img src="https://img.youtube.com/vi/{{ $video->youtube_id }}/maxresdefault.jpg" alt="{{ $video->title }}" class="w-full h-full object-cover" onerror="this.src='https://img.youtube.com/vi/{{ $video->youtube_id }}/hqdefault.jpg'">
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition">
                                <div class="absolute bottom-4 left-4 right-4">
                                    <p class="text-sm font-medium text-white mb-1">{{ $video->title }}</p>
                                    @if($video->description)
                                        <p class="text-xs text-gray-300 line-clamp-2">{{ $video->description }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                                <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="absolute top-3 right-3">
                                <span class="px-2 py-1 text-xs bg-black/50 backdrop-blur-sm rounded-full text-white">
                                    {{ $video->category === 'short' ? 'Short' : 'Horizontal' }}
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="text-center py-16">
                    <p class="text-gray-400">該当する動画がありません</p>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-r from-purple-900/50 to-pink-900/50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl md:text-3xl font-bold mb-4">動画制作のご依頼</h2>
            <p class="text-gray-300 mb-6">
                あなたのプロジェクトに合わせた動画を制作いたします
            </p>
            <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full text-white font-semibold hover:from-purple-700 hover:to-pink-700 transition">
                お問い合わせ
            </a>
        </div>
    </section>
@endsection
