<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tour extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];


    public function getNameWithPlaceAttribute($value)
    {
        return $this->name . $this->touristPlace->name;
    }

    public function touristPlace()
    {
        return $this->belongsTo(TouristPlace::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function tourSubscriptions()
    {
        return $this->hasMany(TourSubscription::class);
    }
}
