<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

//Need change extends class to JsonResource or not works properly
class UserCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'provider' => $this->provider,
            'provider_id' => $this->provider_id,
            'role' => $this->role,
            'customcharacter' => $this->customcharacter,
            'points' => $this->points,
            'urlimage' => $this->urlimage,
            'level' => $this->getLevel(),
        ];
    }
}
