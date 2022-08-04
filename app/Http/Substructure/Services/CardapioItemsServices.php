<?php

namespace App\Http\Substructure\Services;


use App\Http\Substructure\Repositories\CardapioItemsRepository;
use App\Models\CardapioItems;



class CardapioItemsServices  extends BaseServices
{
    public function __construct(CardapioItems $cardapio_item, CardapioItemsRepository $cardapio_item_repository)
    {
        $this->cardapio_item_repository = $cardapio_item_repository;
        $this->cardapio_item = $cardapio_item;
    }

}
