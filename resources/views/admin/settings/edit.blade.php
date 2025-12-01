@extends('layouts.admin')

@section('title', 'サイト設定')

@section('content')
    <div class="max-w-2xl">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">サイト設定</h2>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <form action="{{ route('admin.settings.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b">基本設定</h3>

                    <div class="mb-6">
                        <label for="site_title" class="block text-sm font-medium text-gray-700 mb-2">サイトタイトル</label>
                        <input type="text" name="site_title" id="site_title" value="{{ $settings['site_title'] ?? '' }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        @error('site_title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="site_description" class="block text-sm font-medium text-gray-700 mb-2">サイト説明文</label>
                        <textarea name="site_description" id="site_description" rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">{{ $settings['site_description'] ?? '' }}</textarea>
                        @error('site_description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b">運営者情報</h3>

                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div>
                            <label for="owner_name" class="block text-sm font-medium text-gray-700 mb-2">運営者名（日本語）</label>
                            <input type="text" name="owner_name" id="owner_name" value="{{ $settings['owner_name'] ?? '' }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            @error('owner_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="owner_name_en" class="block text-sm font-medium text-gray-700 mb-2">運営者名（英語）</label>
                            <input type="text" name="owner_name_en" id="owner_name_en" value="{{ $settings['owner_name_en'] ?? '' }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            @error('owner_name_en')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="profile_text" class="block text-sm font-medium text-gray-700 mb-2">プロフィール文</label>
                        <textarea name="profile_text" id="profile_text" rows="4"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">{{ $settings['profile_text'] ?? '' }}</textarea>
                        @error('profile_text')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="contact_email" class="block text-sm font-medium text-gray-700 mb-2">お問い合わせ通知メールアドレス</label>
                        <input type="email" name="contact_email" id="contact_email" value="{{ $settings['contact_email'] ?? '' }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        @error('contact_email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b">SNSリンク</h3>

                    <div class="mb-6">
                        <label for="twitter_url" class="block text-sm font-medium text-gray-700 mb-2">X (Twitter) URL</label>
                        <input type="url" name="twitter_url" id="twitter_url" value="{{ $settings['twitter_url'] ?? '' }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                            placeholder="https://twitter.com/username">
                        @error('twitter_url')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="instagram_url" class="block text-sm font-medium text-gray-700 mb-2">Instagram URL</label>
                        <input type="url" name="instagram_url" id="instagram_url" value="{{ $settings['instagram_url'] ?? '' }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                            placeholder="https://instagram.com/username">
                        @error('instagram_url')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="youtube_url" class="block text-sm font-medium text-gray-700 mb-2">YouTube URL</label>
                        <input type="url" name="youtube_url" id="youtube_url" value="{{ $settings['youtube_url'] ?? '' }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                            placeholder="https://youtube.com/@username">
                        @error('youtube_url')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                        保存
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
