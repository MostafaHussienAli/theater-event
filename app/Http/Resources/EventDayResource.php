<?php

namespace App\Http\Resources;

use App\Models\Goal;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Laracasts\Presenter\Exceptions\PresenterException;

class EventDayResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request
     * @return array
     *
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'data' => $this->date,
        ];
    }
}
