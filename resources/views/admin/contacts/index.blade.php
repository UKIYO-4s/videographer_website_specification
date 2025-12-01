@extends('layouts.admin')

@section('title', 'お問い合わせ管理')

@section('content')
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">お問い合わせ一覧</h2>
    </div>

    <!-- Filter -->
    <div class="bg-white rounded-lg shadow p-4 mb-6">
        <form action="{{ route('admin.contacts.index') }}" method="GET" class="flex flex-wrap gap-4">
            <div class="flex-1 min-w-[200px]">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="名前・メールで検索"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
            </div>
            <div>
                <select name="status" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    <option value="">すべてのステータス</option>
                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>未対応</option>
                    <option value="processing" {{ request('status') === 'processing' ? 'selected' : '' }}>対応中</option>
                    <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>完了</option>
                </select>
            </div>
            <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                検索
            </button>
            @if(request('search') || request('status'))
                <a href="{{ route('admin.contacts.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                    リセット
                </a>
            @endif
        </form>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        @if($contacts->count() > 0)
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">お名前</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">種別</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">予算</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ステータス</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">日時</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">操作</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($contacts as $contact)
                        <tr class="{{ $contact->status === 'pending' ? 'bg-yellow-50' : '' }}">
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $contact->name }}</div>
                                <div class="text-sm text-gray-500">{{ $contact->email }}</div>
                                @if($contact->phone)
                                    <div class="text-sm text-gray-500">{{ $contact->phone }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-gray-600">{{ $contact->inquiry_type_label }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-gray-600">{{ $contact->budget ?? '-' }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                    {{ $contact->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                    {{ $contact->status === 'processing' ? 'bg-blue-100 text-blue-800' : '' }}
                                    {{ $contact->status === 'completed' ? 'bg-green-100 text-green-800' : '' }}">
                                    {{ $contact->status_label }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $contact->created_at->format('Y/m/d H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <div class="flex space-x-3">
                                    <a href="{{ route('admin.contacts.show', $contact) }}" class="text-purple-600 hover:text-purple-900">
                                        詳細
                                    </a>
                                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline" onsubmit="return confirm('本当に削除しますか？')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                            削除
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-6 py-4">
                {{ $contacts->withQueryString()->links() }}
            </div>
        @else
            <div class="px-6 py-12 text-center text-gray-500">
                お問い合わせはまだありません
            </div>
        @endif
    </div>
@endsection
