<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = [
        'place_name',
        'province_id',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
