<?php

namespace App\Http\Substructure\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        dd($this);
        return [
            "id" => $this->id ?? $this->item->id ?? null,
            "nome" =>$this->nome ??$this->item->nome ?? null,
            "calorias" =>$this->calorias ??$this->item->calorias ?? null,
//            "cardapios" => new CardapioResource($this->whenLoaded('cardapios')) ?? null
        ];
    }
}
