<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\BaseController;
use App\Http\Substructure\Repositories\ReservaRepository;
use App\Http\Substructure\Services\ReservaServices;
use Illuminate\Http\Request;

class ReservaController extends BaseController
{

    public function __construct(ReservaServices $service, ReservaRepository $repository)
    {
        parent::__construct($service, $repository);
        $this->service = $service;
    }


    /**
     * @OA\Get(
     *     path="/api/reservas?with[]=cardapio",
     *     summary="Listagem de reservas e cardapios relacionados",
     *     tags={"Reservas"},
     *     description="Get Reservas",
     *     @OA\Response(response="default", description="List Reservas")
     * )
     */
    public function index()
    {
        return $this->repository->list();
    }

    /**
     * @OA\Post(
     *     path="/api/reservas",
     *     summary="Add new Reserva",
     *     tags={"Reservas"},
     *     security={{"bearerAuth":{}}},
     *     description="Add Reserva",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(     *
     *                 @OA\Property(
     *                     property="data",
     *                     type="string"
     *                 ),     *
     *               @OA\Property(
     *                     property="hora",
     *                     type="string"
     *                 ),     *
     *               @OA\Property(
     *                     property="nome_reserva",
     *                     type="string"
     *                 ),     *
     *               @OA\Property(
     *                     property="qtd_pessoas",
     *                     type="integer"
     *                 ),     *
     *               @OA\Property(
     *                     property="contato",
     *                     type="string"
     *                 ),     *
     *               @OA\Property(
     *                     property="cardapio_id",
     *                     type="integer"
     *                 ),     *
     *                 example={"data": "data", "hora": "hora","nome_reserva": "nome","qtd_pessoas": 3,"contato": "contato", "cardapio_id": 1 }
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
     *     path="/api/reservas/{id}?with[]=cardapio",
     *     summary="Mostra a reserva e em qual cardápio será escolhido(opcional)",
     *     description="Show Reserva",
     *     tags={"Reservas"},
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
     *     path="/api/reservas/{id}",
     *     summary="Updates a Reserva",
     *     tags={"Reservas"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         description="Update Reserva",
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
     *                     property="data",
     *                     type="string"
     *                 ),     *
     *               @OA\Property(
     *                     property="hora",
     *                     type="string"
     *                 ),     *
     *               @OA\Property(
     *                     property="nome_reserva",
     *                     type="string"
     *                 ),     *
     *               @OA\Property(
     *                     property="qtd_pessoas",
     *                     type="integer"
     *                 ),     *
     *               @OA\Property(
     *                     property="contato",
     *                     type="string"
     *                 ),     *
     *               @OA\Property(
     *                     property="cardapio_id",
     *                     type="integer"
     *                 ),     *
     *                 example={"data": "data", "hora": "hora","nome_reserva": "nome","qtd_pessoas": 3,"contato": "contato", "cardapio_id": 1 }
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
     *     path="/api/reservas/{id}",
     *     summary="Delete Reserva",
     *     description="Delete Reserva",
     *     tags={"Reservas"},
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
