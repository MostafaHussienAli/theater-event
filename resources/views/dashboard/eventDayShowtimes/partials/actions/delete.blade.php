@can('delete', $eventDayShowtime)
    <a href="#eventDayShowtime-{{ $eventDayShowtime->id }}-delete-model"
       class="btn btn-outline-danger btn-sm"
       data-toggle="modal">
        <i class="fas fa fa-fw fa-user-times"></i>
    </a>


    <!-- Modal -->
    <div class="modal fade" id="eventDayShowtime-{{ $eventDayShowtime->id }}-delete-model" tabindex="-1" role="dialog"
         aria-labelledby="modal-title-{{ $eventDayShowtime->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title-{{ $eventDayShowtime->id }}">@lang('eventDayShowtimes.dialogs.delete.title')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @lang('eventDayShowtimes.dialogs.delete.info')
                </div>
                <div class="modal-footer">
                    {{ BsForm::delete(route('dashboard.event-day-showtimes.destroy', $eventDayShowtime)) }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        @lang('eventDayShowtimes.dialogs.delete.cancel')
                    </button>
                    <button type="submit" class="btn btn-danger">
                        @lang('eventDayShowtimes.dialogs.delete.confirm')
                    </button>
                    {{ BsForm::close() }}
                </div>
            </div>
        </div>
    </div>
@else
    <button
        type="button"
        disabled
        class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-user-times"></i>
    </button>
@endcan
