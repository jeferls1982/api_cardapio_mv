<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;


    protected $fillable = ["data", "hora", "nome_reserva", "qtd_pessoas", "contato", "cardapio_id"];

    public function cardapio(){
        return $this->belongsTo(Cardapio::class)->with('items');
    }
}
