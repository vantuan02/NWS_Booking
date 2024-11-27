<?php

namespace App\Repositories\Repository;

use App\Models\HotelImage;
use App\Repositories\BaseRepository;

class HotelImageRepository extends BaseRepository
{
    public function __construct(HotelImage $hotelImage)
    {
        parent::__construct($hotelImage);
    }
}
