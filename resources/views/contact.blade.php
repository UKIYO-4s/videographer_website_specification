@extends('layouts.public')

@section('title', 'お問い合わせ | ' . \App\Models\SiteSetting::get('site_title', 'Kei Uchida'))

@section('content')
    <section class="py-24 bg-gray-900">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Contact</h1>
                <p class="text-gray-400">お問い合わせ</p>
            </div>

            <div class="bg-gradient-to-b from-gray-800 to-gray-900 rounded-2xl p-8 md:p-12 border border-gray-700">
                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-300 mb-2">
                                お名前 <span class="text-pink-500">*</span>
                            </label>
                            <input type="text" name="name" id="name" required value="{{ old('name') }}"
                                class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                                placeholder="山田 太郎">
                            @error('name')
                                <p class="mt-1 text-sm text-pink-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                                メールアドレス <span class="text-pink-500">*</span>
                            </label>
                            <input type="email" name="email" id="email" required value="{{ old('email') }}"
                                class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                                placeholder="example@email.com">
                            @error('email')
                                <p class="mt-1 text-sm text-pink-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-300 mb-2">
                                電話番号
                            </label>
                            <input type="tel" name="phone" id="phone" value="{{ old('phone') }}"
                                class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                                placeholder="090-1234-5678">
                            @error('phone')
                                <p class="mt-1 text-sm text-pink-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="inquiry_type" class="block text-sm font-medium text-gray-300 mb-2">
                                お問い合わせ種別 <span class="text-pink-500">*</span>
                            </label>
                            <select name="inquiry_type" id="inquiry_type" required
                                class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                                <option value="">選択してください</option>
                                <option value="short" {{ old('inquiry_type') === 'short' ? 'selected' : '' }}>ショート動画</option>
                                <option value="horizontal" {{ old('inquiry_type') === 'horizontal' ? 'selected' : '' }}>横動画</option>
                                <option value="shooting" {{ old('inquiry_type') === 'shooting' ? 'selected' : '' }}>撮影</option>
                                <option value="other" {{ old('inquiry_type') === 'other' ? 'selected' : '' }}>その他</option>
                            </select>
                            @error('inquiry_type')
                                <p class="mt-1 text-sm text-pink-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="budget" class="block text-sm font-medium text-gray-300 mb-2">
                            ご予算
                        </label>
                        <select name="budget" id="budget"
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                            <option value="">選択してください</option>
                            <option value="〜5万円" {{ old('budget') === '〜5万円' ? 'selected' : '' }}>〜5万円</option>
                            <option value="5万円〜10万円" {{ old('budget') === '5万円〜10万円' ? 'selected' : '' }}>5万円〜10万円</option>
                            <option value="10万円〜30万円" {{ old('budget') === '10万円〜30万円' ? 'selected' : '' }}>10万円〜30万円</option>
                            <option value="30万円〜" {{ old('budget') === '30万円〜' ? 'selected' : '' }}>30万円〜</option>
                            <option value="相談したい" {{ old('budget') === '相談したい' ? 'selected' : '' }}>相談したい</option>
                        </select>
                        @error('budget')
                            <p class="mt-1 text-sm text-pink-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-300 mb-2">
                            お問い合わせ内容 <span class="text-pink-500">*</span>
                        </label>
                        <textarea name="message" id="message" rows="6" required
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition resize-none"
                            placeholder="ご依頼内容、ご質問などをお書きください">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="mt-1 text-sm text-pink-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="text-center pt-4">
                        <button type="submit" class="px-12 py-4 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full text-white font-semibold hover:from-purple-700 hover:to-pink-700 transition transform hover:scale-105">
                            送信する
                        </button>
                    </div>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="mt-12 grid md:grid-cols-2 gap-8">
                <div class="bg-gray-800/50 rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold mb-2">メール</h3>
                    <p class="text-gray-400 text-sm">24時間以内にご返信いたします</p>
                </div>
                <div class="bg-gray-800/50 rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold mb-2">対応時間</h3>
                    <p class="text-gray-400 text-sm">平日 10:00 - 19:00</p>
                </div>
            </div>
        </div>
    </section>
@endsection
