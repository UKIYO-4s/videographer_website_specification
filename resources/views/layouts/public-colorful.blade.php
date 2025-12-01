<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ \App\Models\SiteSetting::get('site_description', '内田たかし - 動画編集・撮影サービス') }}">

    <title>@yield('title', \App\Models\SiteSetting::get('site_title', 'Takashi Uchida | Videographer'))</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.bunny.net/css?family=noto-sans-jp:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Noto Sans JP', 'Figtree', sans-serif;
            background: linear-gradient(135deg, #ff6b6b 0%, #feca57 25%, #48dbfb 50%, #ff9ff3 75%, #ff6b6b 100%);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
        }
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }
        .phone-frame {
            border-radius: 40px;
            padding: 10px;
            background: linear-gradient(145deg, #333, #111);
        }
    </style>
</head>
<body class="antialiased min-h-screen">
    <nav class="fixed w-full z-50 bg-white/90 backdrop-blur-sm shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}?design=colorful" class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-500 via-orange-500 to-yellow-500">
                        {{ \App\Models\SiteSetting::get('owner_name_en', 'Takashi Uchida') }}
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-6">
                    <a href="{{ route('home') }}?design=colorful" class="text-gray-700 hover:text-pink-500 transition font-medium">ホーム</a>
                    <a href="{{ route('gallery') }}?design=colorful" class="text-gray-700 hover:text-pink-500 transition font-medium">実績</a>
                    <a href="{{ route('pricing') }}?design=colorful" class="text-gray-700 hover:text-pink-500 transition font-medium">料金</a>
                    <a href="{{ route('contact') }}?design=colorful" class="px-6 py-2 bg-gradient-to-r from-pink-500 via-orange-500 to-yellow-500 rounded-full text-white font-bold shadow-lg hover:shadow-xl transform hover:scale-105 transition">
                        お問い合わせ
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="pt-16">
        @yield('content')
    </main>

    <footer class="bg-white/90 backdrop-blur-sm py-12 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-500 via-orange-500 to-yellow-500 mb-4">
                {{ \App\Models\SiteSetting::get('owner_name_en', 'Takashi Uchida') }}
            </p>
            <p class="text-gray-600">{{ \App\Models\SiteSetting::get('owner_name', '内田たかし') }} - 動画編集・撮影サービス</p>
            <p class="text-gray-400 text-sm mt-4">&copy; {{ date('Y') }} {{ \App\Models\SiteSetting::get('owner_name', '内田たかし') }}. All rights reserved.</p>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
