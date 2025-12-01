@extends('layouts.admin')

@section('title', 'お問い合わせ詳細')

@section('content')
    <div class="max-w-3xl">
        <div class="flex items-center mb-6">
            <a href="{{ route('admin.contacts.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>
            <h2 class="text-2xl font-bold text-gray-800">お問い合わせ詳細</h2>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <!-- Status Bar -->
            <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <span class="px-3 py-1 text-sm font-semibold rounded-full
                        {{ $contact->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                        {{ $contact->status === 'processing' ? 'bg-blue-100 text-blue-800' : '' }}
                        {{ $contact->status === 'completed' ? 'bg-green-100 text-green-800' : '' }}">
                        {{ $contact->status_label }}
                    </span>
                    <span class="text-sm text-gray-500">{{ $contact->created_at->format('Y年m月d日 H:i') }}</span>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">お客様情報</h3>
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">お名前</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $contact->name }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">メールアドレス</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            <a href="mailto:{{ $contact->email }}" class="text-purple-600 hover:text-purple-800">{{ $contact->email }}</a>
                        </dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">電話番号</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $contact->phone ?? '-' }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">お問い合わせ種別</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $contact->inquiry_type_label }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">ご予算</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $contact->budget ?? '-' }}</dd>
                    </div>
                </dl>
            </div>

            <!-- Message -->
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">お問い合わせ内容</h3>
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-sm text-gray-700 whitespace-pre-wrap">{{ $contact->message }}</p>
                </div>
            </div>

            <!-- Status Update -->
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">ステータス変更</h3>
                <form action="{{ route('admin.contacts.status', $contact) }}" method="POST" class="flex gap-4">
                    @csrf
                    @method('PATCH')
                    <select name="status" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <option value="pending" {{ $contact->status === 'pending' ? 'selected' : '' }}>未対応</option>
                        <option value="processing" {{ $contact->status === 'processing' ? 'selected' : '' }}>対応中</option>
                        <option value="completed" {{ $contact->status === 'completed' ? 'selected' : '' }}>完了</option>
                    </select>
                    <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                        更新
                    </button>
                </form>
            </div>

            <!-- Admin Note -->
            <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">管理者メモ</h3>
                <form action="{{ route('admin.contacts.note', $contact) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <textarea name="admin_note" rows="4" placeholder="対応メモを入力..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent mb-4">{{ $contact->admin_note }}</textarea>
                    <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                        メモを保存
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
