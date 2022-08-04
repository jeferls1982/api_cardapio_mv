<?php

namespace App\Http\Substructure\Repositories;


use App\Http\Substructure\Resources\CardapioResource;
use App\Models\Cardapio;



class CardapioRepository  extends BaseRepository{

    protected $model = Cardapio::class;
    protected $resource = CardapioResource::class;

    public function __construct(Cardapio $cardapio)
    {
       $this->cardapio = $cardapio;
    }



}

?>
