<?php

namespace App\Repositories;

interface ServiceRepositoryInterface
{
    public function getAll();

    public function findById($id);

    public function create($data);

    public function update($data, $id);

    public function delete($id);
}
