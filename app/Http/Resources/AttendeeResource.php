<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;

class AttendeeResource extends EventDayShowtimeResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request
     * @return array
     */
    public function toArray($request)
    {
        return array_merge(parent::toArray($request), [
            'name' => $this->name,
            'mobile' => $this->mobile,
            'email' => $this->email,
        ]);
    }
}
