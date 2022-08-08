<?php

namespace App\Http\Substructure\Services;



use App\Http\Substructure\Repositories\UserRepository;
use App\Models\User;


class UserServices  extends BaseServices
{
    public function __construct(User $user, UserRepository $user_repository)
    {
        $this->user_repository = $user_repository;
        $this->user = $user;
    }

}
