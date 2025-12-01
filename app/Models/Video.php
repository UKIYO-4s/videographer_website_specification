<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'title',
        'description',
        'youtube_url',
        'category',
        'thumbnail',
        'is_published',
        'display_order',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeShorts($query)
    {
        return $query->where('category', 'short');
    }

    public function scopeHorizontal($query)
    {
        return $query->where('category', 'horizontal');
    }

    public function getYoutubeIdAttribute()
    {
        preg_match('/(?:youtube\.com\/(?:shorts\/|watch\?v=)|youtu\.be\/)([a-zA-Z0-9_-]+)/', $this->youtube_url, $matches);
        return $matches[1] ?? null;
    }
}
