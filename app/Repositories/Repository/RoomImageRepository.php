<?php

namespace App\Repositories\Repository;

use App\Models\RoomImage;
use App\Repositories\BaseRepository;

class RoomImageRepository extends BaseRepository
{
    public function __construct(RoomImage $roomImage)
    {
        parent::__construct($roomImage);
    }
}
