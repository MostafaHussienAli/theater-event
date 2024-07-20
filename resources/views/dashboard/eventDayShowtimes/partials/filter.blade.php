{{ BsForm::resource('eventDayShowtimes')->get(url()->current()) }}
@component('dashboard::components.box')
    @slot('title', trans('eventDayShowtimes.actions.filter'))

    <div class="row">
        <div class="col-md-4">
            {{
                BsForm::select('event_day_id')
                    ->options($eventDays)
                    ->label(trans('eventDayShowtimes.attributes.event_day_id'))
                    ->value(request('event_day_id'))
                    ->placeholder(trans('eventDayShowtimes.attributes.event_day_id'))
            }}
        </div>
        <div class="col-md-4">
            {{
                BsForm::select('showtime_id')
                    ->options($showtimes)
                    ->label(trans('eventDayShowtimes.attributes.showtime_id'))
                    ->value(request('showtime_id'))
                    ->placeholder(trans('eventDayShowtimes.attributes.showtime_id'))
            }}
        </div>
        <div class="col-md-4">
            {{
                BsForm::select('movie_id')
                    ->options($movies)
                    ->label(trans('eventDayShowtimes.attributes.movie_id'))
                    ->value(request('movie_id'))
                    ->placeholder(trans('eventDayShowtimes.attributes.movie_id'))
            }}
        </div>
        <div class="col-md-4">
            {{ BsForm::number('perPage')
                ->value(request('perPage', 15))
                ->min(1)
                 ->label(trans('eventDayShowtimes.perPage')) }}
        </div>
    </div>

    @slot('footer')
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fas fa fa-fw fa-filter"></i>
            @lang('eventDayShowtimes.actions.filter')
        </button>
    @endslot
@endcomponent
{{ BsForm::close() }}
