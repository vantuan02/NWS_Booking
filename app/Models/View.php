<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class View extends Model
{
    /** @use HasFactory<\Database\Factories\ViewFactory> */
    use HasFactory, SoftDeletes;

    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'room_views');
    }
}
