<?php

namespace App\Repositories\Repository;

use App\Models\Room;
use App\Repositories\BaseRepository;

class RoomRepository extends BaseRepository
{
    public function __construct(Room $room)
    {
        parent::__construct($room);
    }
}
