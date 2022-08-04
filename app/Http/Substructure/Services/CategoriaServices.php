<?php

namespace App\Http\Substructure\Services;


use App\Http\Substructure\Repositories\CategoriaRepository;

use App\Models\Categoria;



class CategoriaServices  extends BaseServices
{


    public function __construct(Categoria $categoria, CategoriaRepository $categoria_repository)
    {
        $this->categoria = $categoria;
        $this->categoria_repository = $categoria_repository;
    }

}
