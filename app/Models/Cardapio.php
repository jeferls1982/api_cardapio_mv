<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cardapio extends Model
{
    use HasFactory;

    protected $fillable = ["titulo", "descricao","foto","preco","categoria_id"];



    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function items(){
        return $this->hasMany(CardapioItems::class)->with('item');
    }
}
