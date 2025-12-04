@extends('layouts.public')

@section('title', '使用機材 | ' . \App\Models\SiteSetting::get('site_title', 'Takashi Uchita'))

@section('content')
    <section class="py-24 bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Equipment</h1>
                <p class="text-gray-400">使用機材</p>
            </div>

            <div class="max-w-4xl mx-auto space-y-12">
                @foreach($equipment as $item)
                    <div class="bg-gradient-to-b from-gray-800 to-gray-900 rounded-2xl p-8 border border-gray-700">
                        <div class="flex items-center gap-2 mb-4">
                            <span class="px-3 py-1 bg-purple-600/20 text-purple-400 rounded-full text-sm">{{ $item['type'] }}</span>
                        </div>
                        <h2 class="text-2xl md:text-3xl font-bold mb-4">{{ $item['name'] }}</h2>
                        <p class="text-gray-400 mb-6">{{ $item['description'] }}</p>

                        <h3 class="text-lg font-semibold mb-4">主な特徴</h3>
                        <ul class="grid md:grid-cols-2 gap-3">
                            @foreach($item['features'] as $feature)
                                <li class="flex items-center text-gray-300">
                                    <svg class="w-5 h-5 text-purple-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    {{ $feature }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>

            <!-- Why These Equipment -->
            <div class="mt-24 max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold text-center mb-12">機材へのこだわり</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="bg-gray-800/50 rounded-2xl p-6">
                        <div class="w-12 h-12 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold mb-2">シネマティックな映像</h3>
                        <p class="text-gray-400 text-sm">SONY FX-3のS-Cinetoneにより、映画のような色味と質感を実現します。</p>
                    </div>
                    <div class="bg-gray-800/50 rounded-2xl p-6">
                        <div class="w-12 h-12 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold mb-2">高速撮影対応</h3>
                        <p class="text-gray-400 text-sm">4K 120fpsで滑らかなスローモーション映像を撮影できます。</p>
                    </div>
                    <div class="bg-gray-800/50 rounded-2xl p-6">
                        <div class="w-12 h-12 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold mb-2">低照度性能</h3>
                        <p class="text-gray-400 text-sm">暗い環境でもノイズの少ないクリアな映像を撮影できます。</p>
                    </div>
                    <div class="bg-gray-800/50 rounded-2xl p-6">
                        <div class="w-12 h-12 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold mb-2">高解像力</h3>
                        <p class="text-gray-400 text-sm">Gマスターレンズによる圧倒的な解像力で、細部まで鮮明に。</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-r from-purple-900/50 to-pink-900/50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl md:text-3xl font-bold mb-4">撮影のご依頼</h2>
            <p class="text-gray-300 mb-6">
                プロ機材を使用した高品質な撮影サービスを提供しています
            </p>
            <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full text-white font-semibold hover:from-purple-700 hover:to-pink-700 transition">
                撮影を依頼する
            </a>
        </div>
    </section>
@endsection
