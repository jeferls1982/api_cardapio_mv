<?php


namespace App\Http\Substructure\Repositories;



use App\Http\Substructure\Resources\UserResource;
use App\Models\User;


class UserRepository extends BaseRepository
{
    protected $model = User::class;
    protected $resource = UserResource::class;




}
