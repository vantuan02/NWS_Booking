<?php

namespace App\Models;

use App\Enums\RoomStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    /** @use HasFactory<\Database\Factories\RoomFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'hotel_id',
        'name',
        'description',
        'price',
        'customer_limit',
        'status',
        'detail'
    ];

    protected $casts = [
        'status' => RoomStatus::class,
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function views()
    {
        return $this->belongsToMany(View::class, 'room_views');
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'room_amenities');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function roomImages()
    {
        return $this->hasMany(RoomImage::class);
    }
}
