<?php

namespace App\Repositories\Interface;

use App\Repositories\BaseRepositoryInterface;

interface HotelRepositoryInterface extends BaseRepositoryInterface {

    public function findOrFailWithImages($id);

}
?>
