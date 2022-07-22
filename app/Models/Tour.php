<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function touristPlace()
    {
        return $this->belongsTo(TouristPlace::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    public function tourSubscriptions()
    {
        return $this->hasMany(TourSubscription::class);
    }
}
