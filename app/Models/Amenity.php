<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    /** @use HasFactory<\Database\Factories\AmenityFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description'
    ];


    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'room_amenities');
    }
}
