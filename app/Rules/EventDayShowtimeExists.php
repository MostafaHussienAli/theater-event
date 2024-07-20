<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class EventDayShowtimeExists implements Rule
{
    protected $event_day_id;
    protected $showtime_id;
    protected $movie_id;

    public function __construct($event_day_id, $showtime_id, $movie_id)
    {
        $this->event_day_id = $event_day_id;
        $this->showtime_id = $showtime_id;
        $this->movie_id = $movie_id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return DB::table('event_day_showtimes')
            ->where('event_day_id', $this->event_day_id)
            ->where('showtime_id', $this->showtime_id)
            ->where('movie_id', $this->movie_id)
            ->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The selected event day, showtime, and movie combination is invalid.';
    }
}
