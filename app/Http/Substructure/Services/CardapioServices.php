<?php

namespace App\Http\Substructure\Services;


use App\Http\Substructure\Repositories\CardapioRepository;
use App\Models\Cardapio;




class CardapioServices  extends BaseServices
{
    public function __construct(Cardapio $cardapio, CardapioRepository $cardapio_repository)
    {
        $this->cardapio_repository = $cardapio_repository;
        $this->cardapio = $cardapio;
    }

}
