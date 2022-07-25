<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function touristPlaces()
    {
        return $this->hasMany(TouristPlace::class);
    }
    public function media()
    {
        return $this->morphOne(Media::class, 'mediable');
    }
    public function tours()
    {
        return $this->hasManyThrough(Tour::class, TouristPlace::class);
    }
}
