<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class RoomView extends Pivot
{
    protected $fillable = [
        'room_id',
        'view_id'
    ];
}
