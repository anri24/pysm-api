<?php

namespace App\Repositories;

use App\Models\Service;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function __construct(
        protected readonly Service $service
    ){}

    public function getAll()
    {
        return $this->service::all();
    }

    public function findById($id)
    {
        return $this->service::query()->findOrFail($id);
    }

    public function create($data)
    {
        return $this->service::create($data);
    }

    public function update($data, $id)
    {
        return $this->findById($id)->update($data);
    }

    public function delete($id)
    {
        return $this->findById($id)->delete();
    }
}
