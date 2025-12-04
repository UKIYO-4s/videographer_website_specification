@extends('layouts.public')

@section('title', 'お問い合わせ完了 | ' . \App\Models\SiteSetting::get('site_title', 'Takashi Uchita'))

@section('content')
    <section class="py-24 bg-gray-900 min-h-[60vh] flex items-center">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="w-20 h-20 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-8">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold mb-4">送信完了</h1>
            <p class="text-gray-400 mb-8">
                お問い合わせいただきありがとうございます。<br>
                内容を確認後、24時間以内にご連絡いたします。
            </p>
            <a href="{{ route('home') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full text-white font-semibold hover:from-purple-700 hover:to-pink-700 transition">
                トップページへ戻る
            </a>
        </div>
    </section>
@endsection
