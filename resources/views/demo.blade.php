<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>デザインデモ - {{ \App\Models\SiteSetting::get('owner_name', '内田たかし') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=noto-sans-jp:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Noto Sans JP', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 min-h-screen py-12">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">デザインデモ選択</h1>
            <p class="text-gray-600">{{ \App\Models\SiteSetting::get('owner_name', '内田たかし') }}様のコーポレートサイト</p>
            <p class="text-gray-500 text-sm mt-2">お好みのデザインをクリックしてプレビューしてください</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Design 1: Colorful & Gradient -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition transform hover:-translate-y-2">
                <div class="h-48 bg-gradient-to-br from-pink-500 via-orange-400 to-yellow-400 flex items-center justify-center">
                    <div class="text-white text-center">
                        <div class="w-16 h-28 bg-white/20 rounded-2xl mx-auto mb-4 flex items-center justify-center">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                        </div>
                        <p class="font-bold">Colorful</p>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">1. カラフル&グラデーション系</h3>
                    <p class="text-gray-600 text-sm mb-4">明るいグラデーション背景、丸みを帯びたボタン、スマホ風フレーム。InstagramやTikTokのような若々しくエネルギッシュなデザイン。</p>
                    <ul class="text-sm text-gray-500 mb-6 space-y-1">
                        <li>- ポップなカラーリング</li>
                        <li>- 丸みのあるUI要素</li>
                        <li>- アニメーション効果</li>
                    </ul>
                    <a href="{{ route('home') }}?design=colorful" class="block w-full py-3 bg-gradient-to-r from-pink-500 to-orange-400 text-white text-center rounded-full font-bold hover:opacity-90 transition">
                        このデザインを見る
                    </a>
                </div>
            </div>

            <!-- Design 2: Modern & Minimal -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition transform hover:-translate-y-2">
                <div class="h-48 bg-white border-b flex items-center justify-center">
                    <div class="text-center">
                        <p class="text-4xl font-light tracking-tight text-gray-900">Minimal</p>
                        <div class="w-12 h-0.5 bg-black mx-auto mt-4"></div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">2. モダン&ミニマルPOP</h3>
                    <p class="text-gray-600 text-sm mb-4">白ベースにアクセントカラー、大きめのタイポグラフィ、余白を活かしたレイアウト。Apple StoreやSpotifyのような洗練されたデザイン。</p>
                    <ul class="text-sm text-gray-500 mb-6 space-y-1">
                        <li>- クリーンなレイアウト</li>
                        <li>- タイポグラフィ重視</li>
                        <li>- 余白を活かした設計</li>
                    </ul>
                    <a href="{{ route('home') }}?design=minimal" class="block w-full py-3 bg-black text-white text-center font-medium hover:bg-gray-800 transition">
                        このデザインを見る
                    </a>
                </div>
            </div>

            <!-- Design 3: Videographer (Current) -->
            <div class="relative bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition transform hover:-translate-y-2 ring-2 ring-purple-500">
                <div class="absolute top-4 right-4 z-10 px-3 py-1 bg-purple-500 text-white text-xs font-bold rounded-full">現在のデザイン</div>
                <div class="h-48 bg-gradient-to-br from-purple-900 via-gray-900 to-pink-900 flex items-center justify-center relative overflow-hidden">
                    <div class="absolute inset-0">
                        <div class="absolute top-1/4 left-1/4 w-32 h-32 bg-purple-600/30 rounded-full blur-2xl"></div>
                        <div class="absolute bottom-1/4 right-1/4 w-32 h-32 bg-pink-600/30 rounded-full blur-2xl"></div>
                    </div>
                    <div class="relative text-center text-white">
                        <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-purple-400 to-pink-400">Videographer</p>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">3. ビデオグラファー特化型</h3>
                    <p class="text-gray-600 text-sm mb-4">大きな動画プレビュー、再生ボタン風の要素、ダイナミックなアニメーション。動画編集者という職業を視覚的に表現したデザイン。</p>
                    <ul class="text-sm text-gray-500 mb-6 space-y-1">
                        <li>- 動画コンテンツを強調</li>
                        <li>- ダークテーマ</li>
                        <li>- グラデーション効果</li>
                    </ul>
                    <a href="{{ route('home') }}" class="block w-full py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white text-center rounded-full font-bold hover:opacity-90 transition">
                        このデザインを見る
                    </a>
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            <p class="text-gray-500 text-sm">運営者: {{ \App\Models\SiteSetting::get('owner_name', '内田たかし') }} ({{ \App\Models\SiteSetting::get('owner_name_en', 'Takashi Uchida') }})</p>
        </div>
    </div>
</body>
</html>
