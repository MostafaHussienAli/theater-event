<?php

namespace App\Http\Resources\SelectResources;

use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieSelectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'text' => $this->name,
            'id' => $this->id,
        ];
    }
}
