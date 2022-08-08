<?php

namespace App\Http\Controllers;

use App\Http\Substructure\Repositories\UserRepository;
use App\Http\Substructure\Services\UserServices;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function __construct(UserServices $service, UserRepository $repository)
    {
        parent::__construct($service, $repository);
        $this->service = $service;

    }


    /**
     * @OA\Get(
     *     path="/api/user",
     *     summary="Dados usuário logado",
     *     security={{"bearerAuth":{}}},
     *     tags={"login"},
     *     description="Get user",
     *     @OA\Response(response="default", description="List Cardapios")
     * )
     */
    public function getUserLogged(Request $request){
        return $request->user();
    }


//    public function index(){
//        return $this->repository->list();
//    }
//

    public function update(Request $request, $id)
    {
        $sanitized = $request->all();

        $test = $sanitized['password'] ?? null;
        if($test){
            $sanitized['password'] = bcrypt($sanitized['password']);
        }



        return $this->repository->update($sanitized, $id);
    }


}
