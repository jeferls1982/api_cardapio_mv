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

    /**
     * @OA\Get(
     *     path="/api/items?with[]=cardapios",
     *     summary="Listagem de items e cardapios relacionados",
     *     tags={"Items"},
     *     description="Get Items",
     *     @OA\Response(response="default", description="List Items")
     * )
     */

    public function index()
    {
        return $this->repository->list();
    }




    /**
     * @OA\Post(
     *     path="/api/items",
     *     summary="Add new Item",
     *     security={{"bearerAuth":{}}},
     *     tags={"Items"},
     *     description="Add Item",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(     *
     *                 @OA\Property(
     *                     property="nome",
     *                     type="string"
     *                 ),     *
     *                 example={"nome": "Pão" }
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *
     *     )
     * )
     */
    public function store(Request $request)
    {
        $sanitized = $request->all();
        return $this->repository->store($sanitized);
    }


    /**
     * @OA\Get(
     *     path="/api/items/{id}?with[]=cardapios",
     *     summary="Mostra o item e em qual cardápio ele está presente",
     *     description="Show Item",
     *     tags={"Items"},
     *     @OA\Parameter(
     *         description="Parameter ",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *     ),
     *     @OA\Response(response="default", description="OK")
     * )
     */
    public function show($id)
    {
        return $this->repository->find($id);
    }



    /**
     * @OA\Put(
     *     path="/api/items/{id}",
     *     summary="Updates a Item",
     *     tags={"Items"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         description="Update Item",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string"),
     *         @OA\Examples(example="int", value="1", summary="item_id"),
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(     *
     *                 @OA\Property(
     *                     property="nome",
     *                     type="string"
     *                 ),     *
     *                 example={"nome": "pão" }
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     */
    public function update(Request $request,$id)
    {
        $sanitized = $request->all();
        return $this->repository->update($sanitized, $id);
    }

    /**
     * @OA\Delete(
     *     path="/api/items/{id}",
     *     summary="Delete Items",
     *     description="Delete Items",
     *     tags={"Items"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         description="Parameter ",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *     ),
     *     @OA\Response(response="default", description="OK")
     * )
     */
    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }
}
