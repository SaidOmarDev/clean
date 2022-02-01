<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'      => $this->id,
            'name'    => $this->name,
            'slogan'  => $this->slogan,
            'logo'    => $this->logo,
            'user_id' => $this->whenLoaded('owner')->id,
            'owner'   => $this->whenLoaded('owner'),
        ];
    }
}
