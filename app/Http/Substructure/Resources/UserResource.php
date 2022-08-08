<?php

namespace App\Http\Substructure\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            "user_type" => $this->user_type,
            "type" => new UserTypeResource($this->whenLoaded('type')),
        ];
    }
}
