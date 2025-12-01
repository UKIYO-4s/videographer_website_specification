@extends('layouts.admin')

@section('title', '料金プラン編集')

@section('content')
    <div class="max-w-2xl">
        <div class="flex items-center mb-6">
            <a href="{{ route('admin.pricing.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>
            <h2 class="text-2xl font-bold text-gray-800">料金プランを編集</h2>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <form action="{{ route('admin.pricing.update', $plan) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">プラン名 <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name', $plan->name) }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-2">料金 <span class="text-red-500">*</span></label>
                        <input type="number" name="price" id="price" value="{{ old('price', $plan->price) }}" required min="0"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        @error('price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="unit" class="block text-sm font-medium text-gray-700 mb-2">単位</label>
                        <input type="text" name="unit" id="unit" value="{{ old('unit', $plan->unit) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        @error('unit')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">説明</label>
                    <textarea name="description" id="description" rows="3"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">{{ old('description', $plan->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">含まれるサービス</label>
                    <div id="features-container">
                        @php $features = old('features', $plan->features ?? []); @endphp
                        @if(is_array($features) && count($features) > 0)
                            @foreach($features as $feature)
                                <div class="flex mb-2">
                                    <input type="text" name="features[]" value="{{ $feature }}"
                                        class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                    <button type="button" onclick="this.parentElement.remove()" class="ml-2 px-3 py-2 text-red-600 hover:text-red-800">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>
                            @endforeach
                        @else
                            <div class="flex mb-2">
                                <input type="text" name="features[]" placeholder="例: カット編集"
                                    class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                <button type="button" onclick="this.parentElement.remove()" class="ml-2 px-3 py-2 text-red-600 hover:text-red-800">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>
                        @endif
                    </div>
                    <button type="button" onclick="addFeature()" class="mt-2 text-purple-600 hover:text-purple-800 text-sm">
                        + 項目を追加
                    </button>
                </div>

                <div class="mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $plan->is_active) ? 'checked' : '' }}
                            class="rounded border-gray-300 text-purple-600 shadow-sm focus:ring-purple-500">
                        <span class="ml-2 text-sm text-gray-700">有効にする</span>
                    </label>
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('admin.pricing.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                        キャンセル
                    </a>
                    <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                        更新
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
        function addFeature() {
            const container = document.getElementById('features-container');
            const div = document.createElement('div');
            div.className = 'flex mb-2';
            div.innerHTML = `
                <input type="text" name="features[]"
                    class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                <button type="button" onclick="this.parentElement.remove()" class="ml-2 px-3 py-2 text-red-600 hover:text-red-800">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            `;
            container.appendChild(div);
        }
    </script>
    @endpush
@endsection
