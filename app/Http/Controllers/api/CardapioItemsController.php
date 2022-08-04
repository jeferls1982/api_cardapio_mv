<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\BaseController;

use App\Http\Substructure\Repositories\CardapioItemsRepository;
use App\Http\Substructure\Services\CardapioItemsServices;
use Illuminate\Http\Request;

class CardapioItemsController extends BaseController
{
    public function __construct(CardapioItemsServices $service, CardapioItemsRepository $repository)
    {
        parent::__construct($service, $repository);
        $this->service = $service;
    }


    public function index()
    {
        return $this->repository->list();
    }


    public function store(Request $request)
    {
        $sanitized = $request->all();
        return $this->repository->store($sanitized);
    }

    public function show($id)
    {
        return $this->repository->find($id);
    }


    public function update(Request $request, $id)
    {
        $sanitized = $request->all();
        return $this->repository->update($sanitized, $id);
    }


    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }
}
