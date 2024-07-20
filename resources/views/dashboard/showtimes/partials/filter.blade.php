{{ BsForm::resource('showtimes')->get(url()->current()) }}
@component('dashboard::components.box')
    @slot('title', trans('showtimes.actions.filter'))

    <div class="row">
        <div class="col-md-4">
            {{ BsForm::time('start_time')->value(request('start_time')) }}
        </div>
        <div class="col-md-4">
            {{ BsForm::time('end_time')->value(request('end_time')) }}
        </div>
        <div class="col-md-4">
            {{ BsForm::number('perPage')
                ->value(request('perPage', 15))
                ->min(1)
                 ->label(trans('showtimes.perPage')) }}
        </div>
    </div>

    @slot('footer')
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fas fa fa-fw fa-filter"></i>
            @lang('showtimes.actions.filter')
        </button>
    @endslot
@endcomponent
{{ BsForm::close() }}
