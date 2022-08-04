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

    /**
     * @OA\Get(
     *     path="/api/cardapio-items",
     *     summary="Listagem de CardapioItems",
     *     tags={"CardapioItems"},
     *     description="Get CardapiItems",
     *     @OA\Response(response="default", description="List Items")
     * )
     */

    public function index()
    {
        return $this->repository->list();
    }


    /**
     * @OA\Post(
     *     path="/api/cardapio-items",
     *     summary="Add new",
     *     tags={"CardapioItems"},
     *     description="Relacionar um item a um cardapio",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(     *
     *                 @OA\Property(
     *                     property="item_id",
     *                     type="integer"
     *                 ),     *
     *                 @OA\Property(
     *                     property="cardapio_id",
     *                     type="integer"
     *                 ),     *
     *                 example={"item_id": 1,"cardapio_id": 1 }
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
     *     path="/api/cardapio-items/{id}",
     *     summary="show",
     *     description="Show CardapioItems",
     *     tags={"CardapioItems"},
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
     *     path="/api/cardapio-items/{id}",
     *     summary="Updates a CardapioItems",
     *     tags={"CardapioItems"},
     *     @OA\Parameter(
     *         description="Update",
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
     *                     property="item_id",
     *                     type="integer"
     *                 ),     *
     *                 @OA\Property(
     *                     property="cardapio_id",
     *                     type="integer"
     *                 ),     *
     *                 example={"item_id": 1,"cardapio_id": 1 }
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $sanitized = $request->all();
        return $this->repository->update($sanitized, $id);
    }


    /**
     * @OA\Delete(
     *     path="/api/cardapio-items/{id}",
     *     summary="Delete CardapioItems",
     *     description="Delete CardapioItems",
     *     tags={"CardapioItems"},
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
