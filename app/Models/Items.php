<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $fillable = ["nome", 'calorias'];


    public function cardapios(){
        return $this->hasManyThrough(
            Cardapio::class,
            CardapioItems::class,
            "cardapio_id",
            "id",
            "id",
            "item_id"
        );
    }
}
