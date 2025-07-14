<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'user_id';
    
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

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password_hash',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
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
        return $this->hasMany(\App\Models\Article::class, 'user_id', 'user_id');
    }

    public function getAuthPassword()
    {
        return $this->password_hash; // or password_harsh if that’s your exact column name
    }

    public function getIdAttribute()
    {
        return $this->attributes['user_id'];
    }
}
