<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'intro',
        'content',
        'user_id',
        'place_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
