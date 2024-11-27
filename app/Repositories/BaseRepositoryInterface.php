<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public function all();
    public function findOrFail($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function paginate($limit = 15);
}
