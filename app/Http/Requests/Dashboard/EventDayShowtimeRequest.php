<?php

namespace App\Http\Requests\Dashboard;

use App\Rules\EventDayShowtimeExists;
use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;

class EventDayShowtimeRequest extends FormRequest
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
            'event_day_id' => ['required', 'integer', 'exists:event_days,id'],
            'showtime_id' => ['required', 'integer', 'exists:showtimes,id'],
            'movie_id' => ['required', 'integer', 'exists:movies,id'],
        ];

        return RuleFactory::make($rules);
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return RuleFactory::make(trans('eventDayShowtimes.attributes'));
    }
}
