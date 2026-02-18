<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'username',
        'password_hash',
        'profile_picture_url',
        'bio',
        'expertise',
    ];

    protected $hidden = [
        'password_hash',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password_hash' => 'hashed',
            'expertise' => 'array',
        ];
    }

    public function articles()
    {
        return $this->hasMany(\App\Models\Article::class);
    }

    public function getAuthPassword()
    {
        return $this->password_hash;
    }
}

