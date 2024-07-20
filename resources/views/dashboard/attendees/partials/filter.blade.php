{{ BsForm::resource('attendees')->get(url()->current()) }}
@component('dashboard::components.box')
    @slot('title', trans('attendees.actions.filter'))

    <div class="row">
        <div class="col-md-4">
            {{ BsForm::text('name')->value(request('name')) }}
        </div>
        <div class="col-md-4">
            {{ BsForm::text('mobile')->value(request('mobile')) }}
        </div>
        <div class="col-md-4">
            {{ BsForm::text('email')->value(request('email')) }}
        </div>
        <div class="col-md-4">
            {{
                BsForm::select('event_day_id')
                    ->options($eventDays)
                    ->label(trans('attendees.attributes.event_day_id'))
                    ->value(request('event_day_id'))
                    ->placeholder(trans('attendees.attributes.event_day_id'))
            }}
        </div>
        <div class="col-md-4">
            {{
                BsForm::select('showtime_id')
                    ->options($showtimes)
                    ->label(trans('attendees.attributes.showtime_id'))
                    ->value(request('showtime_id'))
                    ->placeholder(trans('attendees.attributes.showtime_id'))
            }}
        </div>
        <div class="col-md-4">
            {{
                BsForm::select('movie_id')
                    ->options($movies)
                    ->label(trans('attendees.attributes.movie_id'))
                    ->value(request('movie_id'))
                    ->placeholder(trans('attendees.attributes.movie_id'))
            }}
        </div>
        <div class="col-md-4">
            {{ BsForm::number('perPage')
                ->value(request('perPage', 15))
                ->min(1)
                 ->label(trans('attendees.perPage')) }}
        </div>
    </div>

    @slot('footer')
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fas fa fa-fw fa-filter"></i>
            @lang('attendees.actions.filter')
        </button>
    @endslot
@endcomponent
{{ BsForm::close() }}
