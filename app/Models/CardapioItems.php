<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardapioItems extends Model
{
    use HasFactory;

    protected $fillable = ["item_id", "cardapio_id"];

    public function item(){
        return $this->belongsTo(Items::class);
    }

    public function cardapios(){
        return $this->hasMany(Cardapio::class);
    }



}
