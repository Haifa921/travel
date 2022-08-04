<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourSubscription extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getReturnAttribute($value)
    {
        return Carbon::parse($this->take_off)->addDays($this->duration);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
