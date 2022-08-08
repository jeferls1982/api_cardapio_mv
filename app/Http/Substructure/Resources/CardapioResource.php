<?php

namespace App\Http\Substructure\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

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
        try {
            $file = Storage::disk('local')->get($this->foto);
            $this->foto = base64_encode($file);

        } catch (\Exception $ex) {
            $this->foto = null;

        }




        return [
            "id" => $this->id,
            "titulo" => $this->titulo,
            "descricao" => $this->descricao,
            "preco" => $this->preco,
            "categoria_id" => $this->categoria_id,
            "categoria" => new CategoriaResource($this->whenLoaded('categoria')),
            "items" => new CategoriaResource($this->whenLoaded('items')),
            "foto" => $this->foto
        ];
    }
}
