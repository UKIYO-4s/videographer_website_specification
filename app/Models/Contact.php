<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'inquiry_type',
        'budget',
        'message',
        'status',
        'admin_note',
    ];

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeProcessing($query)
    {
        return $query->where('status', 'processing');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function getInquiryTypeLabelAttribute()
    {
        return match($this->inquiry_type) {
            'short' => 'ショート動画',
            'horizontal' => '横動画',
            'shooting' => '撮影',
            'other' => 'その他',
            default => $this->inquiry_type,
        };
    }

    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'pending' => '未対応',
            'processing' => '対応中',
            'completed' => '完了',
            default => $this->status,
        };
    }
}
