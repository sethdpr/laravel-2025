<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsItem extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function favoritedByUsers() {
        return $this->belongsToMany(User::class, 'favorite_newsitem_user');
    }

    protected $fillable = [
    'title',
    'content',
    'image_path',
];
}
