<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelImage extends Model
{
    protected $table = 'hotel_images';
    protected $fillable = ['hotel_id', 'image_url'];

    // Quan hệ với Hotel
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
