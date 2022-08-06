<?php

namespace App\Http\Substructure\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CardapioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "titulo" =>$this->titulo,
            "descricao" =>$this->descricaodescricao,
            "preco" =>$this->preco,
            "categoria_id" =>$this->categoria_id,
            "foto" =>$this->foto
        ];
    }
}
