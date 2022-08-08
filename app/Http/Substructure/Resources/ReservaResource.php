<?php

namespace App\Http\Substructure\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservaResource extends JsonResource
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
            "id" => $this->id ?? null,
            "data" => $this->data ?? null,
            "hora" => $this->hora ?? null,
            "nome_reserva" => $this->nome_reserva ?? null,
            "qtd_pessoas" => $this->qtd_pessoas ?? null,
            "contato" => $this->contato ?? null,
            "cardapio_id" => $this->cardapio_id ?? null,
            "cardapio" => new CardapioResource($this->whenLoaded('cardapio'))
        ];
    }
}
