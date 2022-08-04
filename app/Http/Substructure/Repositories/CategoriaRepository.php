<?php

namespace App\Http\Substructure\Repositories;
use App\Http\Substructure\Resources\CategoriaResource;

use App\Models\Categoria;




class CategoriaRepository  extends BaseRepository{

    protected $model = Categoria::class;
    protected $orderBy = "nome";
    protected $resource = CategoriaResource::class;

    public function __construct(Categoria $categoria)
    {
       $this->categoria = $categoria;
    }



}

?>
