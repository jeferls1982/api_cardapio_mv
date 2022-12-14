<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\Http\Substructure\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function __construct(UserRepository $user_repository)
    {
        $this->user_repository = $user_repository;
    }

    /**
     * @OA\Post(
     *     path="/api/auth/login",
     *     summary="Login",
     *     tags={"login"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(     *
     *                 @OA\Property(
     *                     property="email",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     type="string"
     *                 ),
     *                 example={"email": "admin@email.com","password": "1234"}
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
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!auth()->attempt($credentials))
            abort(401, "Invalid Credentials");

        $token = auth()->user()->createToken("auth_token");

        return response()->json([
            'data' => [
                'token' => $token->plainTextToken
            ]
        ]);
    }


    /**
     * @OA\Post(
     *     path="/api/auth/logout",
     *     summary="Logout",
     *     tags={"login"},
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *
     *     )
     * )
     */
    public function logout()
    {
        auth()->user()->tokens()->delete(); //remove todos os tokens

        // auth()->user()->currentAccessToken()->delete(); // remove o da requisi????o
    }

    /**
     * @OA\Post(
     *     path="/api/recover-password",
     *     summary="Recover password",
     *     tags={"users recover Password"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(     *
     *                 @OA\Property(
     *                     property="email",
     *                     type="string"
     *                 ),     *
     *                 example={"email": "test@email.com"}
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
}
