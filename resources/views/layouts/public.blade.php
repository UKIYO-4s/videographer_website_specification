<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ \App\Models\SiteSetting::get('site_description', '内田敬 - 動画編集・撮影サービス') }}">

    <title>@yield('title', \App\Models\SiteSetting::get('site_title', 'Kei Uchida | Videographer'))</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.bunny.net/css?family=noto-sans-jp:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Noto Sans JP', 'Figtree', sans-serif;
        }
    </style>
</head>
<body class="antialiased bg-gray-900 text-white">
    <nav class="fixed w-full z-50 bg-gray-900/95 backdrop-blur-sm border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-xl font-bold text-white hover:text-purple-400 transition">
                        {{ \App\Models\SiteSetting::get('owner_name_en', 'Kei Uchida') }}
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-300 hover:text-white transition {{ request()->routeIs('home') ? 'text-white' : '' }}">ホーム</a>
                    <a href="{{ route('gallery') }}" class="text-gray-300 hover:text-white transition {{ request()->routeIs('gallery') ? 'text-white' : '' }}">実績</a>
                    <a href="{{ route('pricing') }}" class="text-gray-300 hover:text-white transition {{ request()->routeIs('pricing') ? 'text-white' : '' }}">料金</a>
                    <a href="{{ route('equipment') }}" class="text-gray-300 hover:text-white transition {{ request()->routeIs('equipment') ? 'text-white' : '' }}">機材</a>
                    <a href="{{ route('contact') }}" class="px-4 py-2 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full text-white font-medium hover:from-purple-700 hover:to-pink-700 transition">
                        お問い合わせ
                    </a>
                </div>

                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-btn" class="text-gray-300 hover:text-white">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden bg-gray-900 border-t border-gray-800">
            <div class="px-4 pt-2 pb-4 space-y-2">
                <a href="{{ route('home') }}" class="block py-2 text-gray-300 hover:text-white">ホーム</a>
                <a href="{{ route('gallery') }}" class="block py-2 text-gray-300 hover:text-white">実績</a>
                <a href="{{ route('pricing') }}" class="block py-2 text-gray-300 hover:text-white">料金</a>
                <a href="{{ route('equipment') }}" class="block py-2 text-gray-300 hover:text-white">機材</a>
                <a href="{{ route('contact') }}" class="block py-2 text-purple-400 hover:text-purple-300">お問い合わせ</a>
            </div>
        </div>
    </nav>

    <main class="pt-16">
        @yield('content')
    </main>

    <footer class="bg-gray-950 border-t border-gray-800 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-bold mb-4">{{ \App\Models\SiteSetting::get('owner_name_en', 'Kei Uchida') }}</h3>
                    <p class="text-gray-400 text-sm">
                        {{ \App\Models\SiteSetting::get('owner_name', '内田敬') }}<br>
                        動画編集・撮影サービス
                    </p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-300 mb-4">ナビゲーション</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition">ホーム</a></li>
                        <li><a href="{{ route('gallery') }}" class="hover:text-white transition">実績</a></li>
                        <li><a href="{{ route('pricing') }}" class="hover:text-white transition">料金</a></li>
                        <li><a href="{{ route('equipment') }}" class="hover:text-white transition">機材</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-white transition">お問い合わせ</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-300 mb-4">サービス</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li>ショート動画編集</li>
                        <li>横動画編集</li>
                        <li>撮影サービス</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-500 text-sm">
                <p>&copy; {{ date('Y') }} {{ \App\Models\SiteSetting::get('owner_name', '内田敬') }}. All rights reserved.</p>
                <p class="mt-2 text-xs">運営者: {{ \App\Models\SiteSetting::get('owner_name', '内田敬') }} ({{ \App\Models\SiteSetting::get('owner_name_en', 'Kei Uchida') }})</p>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>

    @stack('scripts')
</body>
</html>
