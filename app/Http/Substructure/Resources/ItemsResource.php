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
            "id" => $this->item->id ?? null,
            "nome" => $this->item->nome ?? null,
//            "cardapios" => new CardapioResource($this->whenLoaded('cardapios')) ?? null
        ];
    }
}
