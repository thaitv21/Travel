<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = [
        'prov_name',
        'intro',
    ];

    public function places()
    {
        return $this->hasMany(Place::class);
    }
}
