<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\BaseController;

use App\Http\Substructure\Repositories\CategoriaRepository;
use App\Http\Substructure\Services\CategoriaServices;
use Illuminate\Http\Request;

class CategoriasController extends BaseController
{
    public function __construct(CategoriaServices $service, CategoriaRepository $repository)
    {
        parent::__construct($service, $repository);
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *     path="/api/categorias?with[]=cardapios",
     *     summary="Listagem de categorias",
     *     tags={"Categorias"},
     *     description="Get Categorias",
     *     @OA\Response(response="default", description="List Categorias")
     * )
     */
    public function index()
    {
        return $this->repository->list();
    }


    /**
     * @OA\Post(
     *     path="/api/categorias",
     *     summary="Add new Categoria",
     *     tags={"Categorias"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(     *
     *                 @OA\Property(
     *                     property="nome",
     *                     type="string"
     *                 ),     *
     *                 example={"nome": "Saída" }
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
     *     path="/api/categorias/{id}?with[]=cardapios",
     *     summary="Mostra Categorias e cardápios relacionados",
     *     description="Show Categoria",
     *     tags={"Categorias"},
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
     *     path="/api/categorias/{id}",
     *     summary="Updates a Categoria",
     *     tags={"Categorias"},
     *     @OA\Parameter(
     *         description="Update Categoria",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string"),
     *         @OA\Examples(example="int", value="1", summary="categoria_id"),
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(     *
     *                 @OA\Property(
     *                     property="nome",
     *                     type="string"
     *                 ),     *
     *                 example={"nome": "Saída" }
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
     *     path="/api/categorias/{id}",
     *     summary="Delete Categoria",
     *     description="Delete Categoria",
     *     tags={"Categorias"},
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
