<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

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
}
