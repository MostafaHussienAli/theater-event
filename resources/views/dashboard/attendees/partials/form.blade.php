<!-- resources/views/registration.blade.php -->
@include('dashboard.errors')

<!-- Step 1: Event and Showtime Selection Form -->
<div id="step-1">
    {{ BsForm::select('event_day_id')
        ->required()
        ->options($eventDays)
        ->label(trans('eventDayShowtimes.attributes.event_day_id'))
        ->value(isset($attendee) ? $attendee->event_day_id : '')
        ->placeholder(trans('eventDayShowtimes.attributes.event_day_id'))
    }}
    {{ BsForm::select('showtime_id')
        ->required()
        ->options([])
        ->label(trans('eventDayShowtimes.attributes.showtime_id'))
        ->value(isset($attendee) ? $attendee->showtime_id : '')
        ->placeholder(trans('eventDayShowtimes.attributes.showtime_id'))
    }}
    {{ BsForm::select('movie_id')
        ->required()
        ->options([])
        ->label(trans('eventDayShowtimes.attributes.movie_id'))
        ->value(isset($attendee) ? $attendee->movie_id : '')
        ->placeholder(trans('eventDayShowtimes.attributes.movie_id'))
    }}
</div>

<!-- Step 2: Attendee Details Form -->
<div id="step-2" style="display: none;">
    {{ BsForm::text('name') }}
    {{ BsForm::text('mobile') }}
    {{ BsForm::text('email') }}
    <input type="hidden" id="event_day_id_hidden" name="event_day_id">
    <input type="hidden" id="showtime_id_hidden" name="showtime_id">
    <input type="hidden" id="movie_id_hidden" name="movie_id">
</div>

{{--<!-- Existing submit button -->--}}
{{--<button type="submit">Submit</button>--}}

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        let eventDayIdEl = $('#event_day_id');
        let showtimeIdEl = $('#showtime_id');
        let movieIdEl = $('#movie_id');

        // Handle changes in event day to populate showtimes
        eventDayIdEl.on('change', function () {
            let eventDayId = $(this).val();
            if (eventDayId) {
                $.ajax({
                    url: '{{ url('/api/select/event-day-showtimes') }}',
                    data: { event_day_id: eventDayId },
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        showtimeIdEl.empty().append('<option value="">{{ trans('eventDayShowtimes.attributes.showtime_id') }}</option>');
                        $.each(data.data, function (key, value) {
                            showtimeIdEl.append('<option value="' + value.id + '">' + value.text + '</option>');
                        });
                    }
                });
            } else {
                showtimeIdEl.empty().append('<option value="">{{ trans('eventDayShowtimes.attributes.showtime_id') }}</option>');
                movieIdEl.empty().append('<option value="">{{ trans('eventDayShowtimes.attributes.movie_id') }}</option>');
            }
        });

        // Handle changes in showtime to populate movies
        showtimeIdEl.on('change', function () {
            let showtimeId = $(this).val();
            if (showtimeId) {
                $.ajax({
                    url: '{{ url('/api/select/event-day-movies') }}',
                    data: { showtime_id: showtimeId, event_day_id: eventDayIdEl.val() },
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        movieIdEl.empty().append('<option value="">{{ trans('eventDayShowtimes.attributes.movie_id') }}</option>');
                        $.each(data.data, function (key, value) {
                            movieIdEl.append('<option value="' + value.id + '">' + value.text + '</option>');
                        });
                    }
                });
            } else {
                movieIdEl.empty().append('<option value="">{{ trans('eventDayShowtimes.attributes.movie_id') }}</option>');
            }
        });

        // Show the second step when the form is submitted
        $('form').on('submit', function (e) {
            if ($('#step-1').is(':visible')) {
                e.preventDefault();

                // Check if all required fields in step 1 are filled
                if (eventDayIdEl.val() && showtimeIdEl.val() && movieIdEl.val()) {
                    // Move values to hidden inputs
                    $('#event_day_id_hidden').val(eventDayIdEl.val());
                    $('#showtime_id_hidden').val(showtimeIdEl.val());
                    $('#movie_id_hidden').val(movieIdEl.val());

                    // Hide step 1 and show step 2
                    $('#step-1').hide();
                    $('#step-2').show();
                } else {
                    alert('Please complete all fields in Step 1.');
                }
            }
            // If Step 2 is visible, submit the form
            else if ($('#step-2').is(':visible')) {
                // Allow the form to submit
                return true;
            }
        });
    });
</script>
@endpush
