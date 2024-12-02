<?php

namespace App\Repositories\Repository;

use App\Models\View;
use App\Repositories\BaseRepository;

class ViewRepository extends BaseRepository
{
    public function __construct(View $view)
    {
        parent::__construct($view);
    }

    public function getName(){
        return $this->model->pluck('name', 'id');
    }
}
