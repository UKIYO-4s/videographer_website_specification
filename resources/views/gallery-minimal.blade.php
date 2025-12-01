@extends('layouts.public-minimal')

@section('title', '実績 | ' . \App\Models\SiteSetting::get('site_title', 'Takashi Uchida'))

@section('content')
    <section class="py-24">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-16">
                <p class="text-gray-500 tracking-widest text-sm mb-4">PORTFOLIO</p>
                <h1 class="text-5xl font-light text-gray-900">Works</h1>
                <div class="w-16 h-0.5 bg-black mt-8"></div>
                <p class="text-gray-600 mt-6">月間100本以上のショート動画納品実績</p>
            </div>

            <!-- Filter -->
            <div class="flex gap-8 mb-12 border-b border-gray-200 pb-4">
                <a href="{{ route('gallery') }}?design=minimal" class="text-sm tracking-wide {{ !$category ? 'text-black font-medium border-b-2 border-black pb-4 -mb-4' : 'text-gray-500 hover:text-black' }} transition">
                    All
                </a>
                <a href="{{ route('gallery', ['category' => 'short']) }}?design=minimal" class="text-sm tracking-wide {{ $category === 'short' ? 'text-black font-medium border-b-2 border-black pb-4 -mb-4' : 'text-gray-500 hover:text-black' }} transition">
                    Short
                </a>
                <a href="{{ route('gallery', ['category' => 'horizontal']) }}?design=minimal" class="text-sm tracking-wide {{ $category === 'horizontal' ? 'text-black font-medium border-b-2 border-black pb-4 -mb-4' : 'text-gray-500 hover:text-black' }} transition">
                    Horizontal
                </a>
            </div>

            <!-- Videos Grid -->
            @if($videos->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($videos as $video)
                        <a href="{{ $video->youtube_url }}" target="_blank" rel="noopener noreferrer" class="group relative aspect-[9/16] bg-gray-100 overflow-hidden">
                            @if($video->thumbnail)
                                <img src="{{ Storage::url($video->thumbnail) }}" alt="{{ $video->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            @else
                                <img src="https://img.youtube.com/vi/{{ $video->youtube_id }}/maxresdefault.jpg" alt="{{ $video->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" onerror="this.src='https://img.youtube.com/vi/{{ $video->youtube_id }}/hqdefault.jpg'">
                            @endif
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition duration-300">
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                                    <div class="w-14 h-14 border-2 border-white rounded-full flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white ml-0.5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8 5v14l11-7z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="absolute bottom-0 left-0 right-0 p-4 opacity-0 group-hover:opacity-100 transition">
                                    <p class="text-white text-sm font-medium">{{ $video->title }}</p>
                                    @if($video->description)
                                        <p class="text-gray-300 text-xs mt-1 line-clamp-2">{{ $video->description }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="absolute top-3 right-3">
                                <span class="px-2 py-1 text-xs bg-white/90 text-gray-700">
                                    {{ $video->category === 'short' ? 'Short' : 'Horizontal' }}
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="text-center py-24">
                    <p class="text-gray-500">該当する動画がありません</p>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 bg-gray-900 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-gray-500 tracking-widest text-sm mb-4">GET IN TOUCH</p>
            <h2 class="text-4xl font-light mb-8">動画制作のご依頼</h2>
            <p class="text-gray-400 mb-12 leading-relaxed">
                あなたのプロジェクトに合わせた動画を制作いたします
            </p>
            <a href="{{ route('contact') }}?design=minimal" class="inline-block px-12 py-4 bg-white text-gray-900 font-medium hover:bg-gray-100 transition">
                Contact Me
            </a>
        </div>
    </section>
@endsection
