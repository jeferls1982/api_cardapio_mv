<?php

namespace App\Http\Substructure\Repositories;

use App\Http\Substructure\Resources\CardapioItemsResource;
use App\Models\CardapioItems;


class CardapioItemsRepository  extends BaseRepository{

    protected $model = CardapioItems::class;
    protected $resource = CardapioItemsResource::class;

    public function __construct(CardapioItems $cardapio_items)
    {
       $this->cardapio_items = $cardapio_items;
    }



}

?>
