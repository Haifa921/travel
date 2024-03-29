<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
    public function touristPlaces()
    {
        return $this->hasMany(TouristPlace::class);
    }
    public function destinations()
    {
        return $this->hasManyThrough(Tour::class, TouristPlace::class);
    }
}
