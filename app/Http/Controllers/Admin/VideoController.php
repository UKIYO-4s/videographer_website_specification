<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::orderBy('display_order')->paginate(10);
        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.videos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'youtube_url' => 'required|url|max:500',
            'category' => 'required|in:short,horizontal',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_published' => 'boolean',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $validated['display_order'] = Video::max('display_order') + 1;
        $validated['is_published'] = $request->has('is_published');

        Video::create($validated);

        return redirect()->route('admin.videos.index')->with('success', '動画を追加しました');
    }

    public function edit(Video $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'youtube_url' => 'required|url|max:500',
            'category' => 'required|in:short,horizontal',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_published' => 'boolean',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($video->thumbnail) {
                Storage::disk('public')->delete($video->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $validated['is_published'] = $request->has('is_published');

        $video->update($validated);

        return redirect()->route('admin.videos.index')->with('success', '動画を更新しました');
    }

    public function destroy(Video $video)
    {
        if ($video->thumbnail) {
            Storage::disk('public')->delete($video->thumbnail);
        }

        $video->delete();

        return redirect()->route('admin.videos.index')->with('success', '動画を削除しました');
    }

    public function updateOrder(Request $request)
    {
        $request->validate([
            'order' => 'required|array',
            'order.*' => 'integer|exists:videos,id',
        ]);

        foreach ($request->order as $index => $id) {
            Video::where('id', $id)->update(['display_order' => $index + 1]);
        }

        return response()->json(['success' => true]);
    }

    public function togglePublish(Video $video)
    {
        $video->update(['is_published' => !$video->is_published]);

        return redirect()->route('admin.videos.index')
            ->with('success', $video->is_published ? '動画を公開しました' : '動画を非公開にしました');
    }
}
