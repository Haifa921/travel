<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
protected $guarded=[];
    public function restaurantReservations()
    {
        return $this->hasMany(RestaurantReservation::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
