<?php

namespace App\Http\Requests\Dashboard;

use App\Rules\EventDayShowtimeExists;
use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;

class AttendeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'numeric'],
            'email' => ['required', 'email:rfc,dns'],
            'event_day_id' => ['required', 'integer', 'exists:event_days,id'],
            'showtime_id' => ['required', 'integer', 'exists:showtimes,id'],
            'movie_id' => ['required', 'integer', 'exists:movies,id'],
        ];

        // Add the custom rule if the basic validations pass
        if ($this->event_day_id && $this->showtime_id && $this->movie_id) {
            $rules['event_day_showtime'] = [
                new EventDayShowtimeExists($this->event_day_id, $this->showtime_id, $this->movie_id)
            ];
        }

        return RuleFactory::make($rules);
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return RuleFactory::make(trans('attendees.attributes'));
    }
}
