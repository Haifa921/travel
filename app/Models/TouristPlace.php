<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TouristPlace extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}
