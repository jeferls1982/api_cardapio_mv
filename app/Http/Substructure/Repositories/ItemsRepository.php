<?php

namespace App\Http\Substructure\Repositories;
use App\Http\Substructure\Resources\ItemsResource;
use App\Models\Items;



class ItemsRepository  extends BaseRepository{

    protected $model = Items::class;
    protected $orderBy = "nome";
    protected $resource = ItemsResource::class;

    public function __construct(Items $item)
    {
       $this->item = $item;
    }



}

?>
