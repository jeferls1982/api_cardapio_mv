<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $fillable = ["nome"];


    public function cardapios(){
        return $this->hasManyThrough(
            Cardapio::class,
            CardapioItems::class,
            "item_id",
            "id",
            "id",
            "cardapio_id"
        );
    }
}
