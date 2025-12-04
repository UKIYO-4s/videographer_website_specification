@extends('layouts.public-minimal')

@section('title', 'お問い合わせ | ' . \App\Models\SiteSetting::get('site_title', 'Takashi Uchita'))

@section('content')
    <section class="py-24">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-16">
                <p class="text-gray-500 tracking-widest text-sm mb-4">CONTACT</p>
                <h1 class="text-5xl font-light text-gray-900">お問い合わせ</h1>
                <div class="w-16 h-0.5 bg-black mt-8"></div>
                <p class="text-gray-600 mt-6">お気軽にご連絡ください</p>
            </div>

            <!-- Contact Info -->
            <div class="grid md:grid-cols-3 gap-6">
                <a href="mailto:taritaritazutazu@gmail.com" class="text-center p-10 border border-gray-200 hover:border-black transition group">
                    <div class="w-14 h-14 border border-gray-300 group-hover:border-black flex items-center justify-center mx-auto mb-6 transition">
                        <svg class="w-6 h-6 text-gray-600 group-hover:text-black transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="font-medium text-gray-900 text-lg mb-3">Email</h3>
                    <p class="text-gray-600 text-sm group-hover:text-black transition">taritaritazutazu@gmail.com</p>
                </a>
                <a href="tel:080-1264-8634" class="text-center p-10 border border-gray-200 hover:border-black transition group">
                    <div class="w-14 h-14 border border-gray-300 group-hover:border-black flex items-center justify-center mx-auto mb-6 transition">
                        <svg class="w-6 h-6 text-gray-600 group-hover:text-black transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <h3 class="font-medium text-gray-900 text-lg mb-3">Phone</h3>
                    <p class="text-gray-600 text-sm group-hover:text-black transition">080-1264-8634</p>
                </a>
                <a href="https://www.chatwork.com/takana7" target="_blank" rel="noopener noreferrer" class="text-center p-10 border border-gray-200 hover:border-black transition group">
                    <div class="w-14 h-14 border border-gray-300 group-hover:border-black flex items-center justify-center mx-auto mb-6 transition">
                        <svg class="w-6 h-6 text-gray-600 group-hover:text-black transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    <h3 class="font-medium text-gray-900 text-lg mb-3">Chatwork</h3>
                    <p class="text-gray-600 text-sm group-hover:text-black transition">Chatworkで連絡</p>
                </a>
            </div>
        </div>
    </section>
@endsection
