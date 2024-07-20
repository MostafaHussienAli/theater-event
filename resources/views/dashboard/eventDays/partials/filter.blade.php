{{ BsForm::resource('eventDays')->get(url()->current()) }}
@component('dashboard::components.box')
    @slot('title', trans('eventDays.actions.filter'))

    <div class="row">
        <div class="col-md-4">
            {{ BsForm::date('date')->value(request('date')) }}
        </div>
        <div class="col-md-4">
            {{ BsForm::number('perPage')
                ->value(request('perPage', 15))
                ->min(1)
                 ->label(trans('eventDays.perPage')) }}
        </div>
    </div>

    @slot('footer')
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fas fa fa-fw fa-filter"></i>
            @lang('eventDays.actions.filter')
        </button>
    @endslot
@endcomponent
{{ BsForm::close() }}
