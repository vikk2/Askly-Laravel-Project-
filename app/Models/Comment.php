<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'user_id', 'article_id', 'parent_id'];

    // Relations

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
}
