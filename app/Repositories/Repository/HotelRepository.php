<?php

namespace App\Repositories\Repository;

use App\Models\Hotel;
use App\Repositories\BaseRepository;

class HotelRepository extends BaseRepository
{
    public function __construct(Hotel $hotel)
    {
        parent::__construct($hotel);
    }
    public function getName(){
        return $this->model->pluck('name', 'id');
    }
}
