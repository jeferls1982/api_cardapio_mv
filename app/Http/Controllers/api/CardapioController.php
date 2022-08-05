<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\BaseController;

use App\Http\Substructure\Repositories\CardapioRepository;
use App\Http\Substructure\Services\CardapioServices;
use Illuminate\Http\Request;

class CardapioController extends BaseController
{

    public function __construct(CardapioServices $service, CardapioRepository $repository)
    {
        parent::__construct($service, $repository);
        $this->service = $service;
    }
    /**
     * @OA\Get(
     *     path="/api/cardapios?with[]=items",
     *     summary="Listagem de cardápios",
     *     tags={"Cardapios"},
     *     description="Get Cardapio",
     *     @OA\Response(response="default", description="List Cardapios")
     * )
     */

    public function index()
    {
        return $this->repository->list();
    }

    /**
     * @OA\Post(
     *     path="/api/cardapios",
     *     summary="Add new Cardapio",
     *     tags={"Cardapios"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(     *
     *                 @OA\Property(
     *                     property="titulo",
     *                     type="string"
     *                 ),     *
     *                 @OA\Property(
     *                     property="descricao",
     *                     type="string"
     *                 ),     *
     *                @OA\Property(
     *                     property="foto",
     *                     type="string"
     *                 ),     *
     *                @OA\Property(
     *                     property="preco",
     *                     type="decimal"
     *                 ),     *
     *                @OA\Property(
     *                     property="categoria_id",
     *                     type="integer"
     *                 ),     *
     *                 example={"titulo": "Almoço", "descricao": "Prato Feito", "foto":"imagem.jpg", "preco": 1.89, "categoria_id":1 }
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
     *     path="/api/cardapios/{id}?with[]=categoria&with[]=items",
     *     summary="Mostra Cardápio e items do cardápio",
     *     description="Show Cardápio",
     *     tags={"Cardapios"},
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
     *     path="/api/cardapios/{id}",
     *     summary="Updates a Cardapio",
     *     tags={"Cardapios"},
     *     @OA\Parameter(
     *         description="Update Cardapio",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string"),
     *         @OA\Examples(example="int", value="1", summary="estado_id"),
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(     *
     *                 @OA\Property(
     *                     property="titulo",
     *                     type="string"
     *                 ),     *
     *                 @OA\Property(
     *                     property="descricao",
     *                     type="string"
     *                 ),     *
     *                @OA\Property(
     *                     property="foto",
     *                     type="string"
     *                 ),     *
     *                @OA\Property(
     *                     property="preco",
     *                     type="decimal"
     *                 ),     *
     *                @OA\Property(
     *                     property="categoria_id",
     *                     type="integer"
     *                 ),     *
     *                 example={"titulo": "Almoço", "descricao": "Prato Feito", "foto":"imagem.jpg", "preco": 1.89, "categoria_id":1 }
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
     *     path="/api/cardapios/{id}",
     *     summary="Delete Cardapio",
     *     description="Delete Cardapio",
     *     tags={"Cardapios"},
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
