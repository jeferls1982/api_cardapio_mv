<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\BaseController;

use App\Http\Substructure\Repositories\ItemsRepository;
use App\Http\Substructure\Services\ItemsServices;
use Illuminate\Http\Request;

class ItemController extends BaseController
{


    public function __construct(ItemsServices $service, ItemsRepository $repository)
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



    public function update(Request $request,$id)
    {
        $sanitized = $request->all();
        return $this->repository->update($sanitized, $id);
//        dd($id, $sanitized);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }
}
