<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    /** @use HasFactory<\Database\Factories\HotelFactory> */
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'description',
        'address'
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function hotelImages()
    {
        return $this->hasMany(HotelImage::class);
    }
}
