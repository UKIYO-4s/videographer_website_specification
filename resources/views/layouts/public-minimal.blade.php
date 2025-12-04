<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ \App\Models\SiteSetting::get('site_description', '内田敬 - 動画編集・撮影サービス') }}">

    <title>@yield('title', \App\Models\SiteSetting::get('site_title', 'Takashi Uchita | Videographer'))</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.bunny.net/css?family=noto-sans-jp:300,400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Noto Sans JP', 'Inter', sans-serif;
        }
    </style>
</head>
<body class="antialiased bg-white text-gray-900">
    <nav class="fixed w-full z-50 bg-white border-b border-gray-100">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="{{ route('home', ['design' => 'minimal']) }}" class="text-2xl font-light tracking-tight">
                        {{ \App\Models\SiteSetting::get('owner_name_en', 'Takashi Uchita') }}
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-12">
                    <a href="{{ route('home', ['design' => 'minimal']) }}" class="text-gray-500 hover:text-black transition font-light tracking-wide">Home</a>
                    <a href="{{ route('gallery', ['design' => 'minimal']) }}" class="text-gray-500 hover:text-black transition font-light tracking-wide">Works</a>
                    <a href="{{ route('pricing', ['design' => 'minimal']) }}" class="text-gray-500 hover:text-black transition font-light tracking-wide">Pricing</a>
                    <a href="{{ route('contact', ['design' => 'minimal']) }}" class="px-6 py-3 bg-black text-white font-medium tracking-wide hover:bg-gray-800 transition">
                        Contact
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="pt-20">
        @yield('content')
    </main>

    <footer class="bg-gray-50 py-16 mt-24">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div>
                    <p class="text-2xl font-light">{{ \App\Models\SiteSetting::get('owner_name_en', 'Takashi Uchita') }}</p>
                    <p class="text-gray-500 mt-2">{{ \App\Models\SiteSetting::get('owner_name', '内田敬') }}</p>
                </div>
                <div class="mt-8 md:mt-0">
                    <p class="text-gray-400 text-sm">&copy; {{ date('Y') }} All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
