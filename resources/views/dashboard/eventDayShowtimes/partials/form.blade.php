@include('dashboard.errors')
{{
    BsForm::select('event_day_id')
    ->required()
    ->options($eventDays)
    ->label(trans('eventDayShowtimes.attributes.event_day_id'))
    ->value(isset($eventDayShowtime) ? $eventDayShowtime->event_day_id : '')
    ->placeholder(trans('eventDayShowtimes.attributes.event_day_id'))
}}
{{
    BsForm::select('showtime_id')
    ->required()
    ->options($showtimes)
    ->label(trans('eventDayShowtimes.attributes.showtime_id'))
    ->value(isset($eventDayShowtime) ? $eventDayShowtime->showtime_id : '')
    ->placeholder(trans('eventDayShowtimes.attributes.showtime_id'))
}}
{{
    BsForm::select('movie_id')
    ->required()
    ->options($movies)
    ->label(trans('eventDayShowtimes.attributes.movie_id'))
    ->value(isset($eventDayShowtime) ? $eventDayShowtime->movie_id : '')
    ->placeholder(trans('eventDayShowtimes.attributes.movie_id'))
}}
