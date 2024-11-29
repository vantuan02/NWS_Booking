<?php

namespace App\Repositories\Repository;

use App\Models\Amenity;
use App\Repositories\BaseRepository;

class AmenityRepository extends BaseRepository
{
    public function __construct(Amenity $amenity)
    {
        parent::__construct($amenity);
    }
}
