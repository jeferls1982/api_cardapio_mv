<?php

namespace App\Http\Substructure\Services;


use App\Http\Substructure\Repositories\ItemsRepository;
use App\Models\Items;


class ItemsServices  extends BaseServices
{


    public function __construct(Items $item, ItemsRepository $items_repository)
    {
        $this->items_repository = $items_repository;
        $this->item = $item;
    }

}
