<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlayerResource extends JsonResource
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
            'full_name' => $this->full_name,
            'email' => $this->email,
            'password' => $this->password,
            'height' => $this->height,
            'weight' => $this->weight,
            'description' => $this->description,
            'squad_number' => $this->squad_number,
            'club' => $this->club->name ?? '',
            'positions_id' => $this->position->name ?? '',
            'nationality_id' => $this->nationality->name ?? '',
            'active' => (bool) $this->active,
        ];
    }
}
