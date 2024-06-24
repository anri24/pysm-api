<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Http\Resources\ServiceResource;
use App\Repositories\ServiceRepository;
use App\Repositories\ServiceRepositoryInterface;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct(
     protected readonly ServiceRepositoryInterface $repository
    ){}

    public function getAll()
    {
        return ServiceResource::collection($this->repository->getAll());
    }

    public function find($id)
    {
        return $this->repository->findById($id);
    }

    public function store(ServiceRequest $request)
    {
        return $this->repository->create($request->validated());
    }

    public function update(ServiceRequest $request,$id)
    {
       return $this->repository->update($request->validated(), $id);
    }

    public function destroy($id)
    {
        return $this->repository->delete($id);
    }
}
