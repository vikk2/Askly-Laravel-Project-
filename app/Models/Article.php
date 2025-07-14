<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'category_id',
        'image_url',
        'status',
        'visibility',
        'comments_allowed',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    // Example relationship: an article belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    // Optional: relationship with comments
    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id')->with('replies');
    }

    // Optional: helper to check if article is published
    public function isPublished()
    {
        return $this->status === 'Published';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
