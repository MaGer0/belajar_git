<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PackagingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'author' => $this->whenLoaded('pembuat'),
            'unit_id' => $this->whenLoaded('unit'),
            'code' => $this->code,
            'name' => $this->name,
            'material' => $this->material,
            'is_waterproof' => $this->is_waterproof
        ];
    }
}
