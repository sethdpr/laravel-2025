<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsItem extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    protected $fillable = [
    'title',    
    'content',
    'image_path',
];
}