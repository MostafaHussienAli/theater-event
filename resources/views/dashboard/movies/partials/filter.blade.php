{{ BsForm::resource('movies')->get(url()->current()) }}
@component('dashboard::components.box')
    @slot('title', trans('movies.actions.filter'))

    <div class="row">
        <div class="col-md-4">
            {{ BsForm::text('name')->value(request('name')) }}
        </div>
        <div class="col-md-4">
            {{ BsForm::number('perPage')
                ->value(request('perPage', 15))
                ->min(1)
                 ->label(trans('movies.perPage')) }}
        </div>
    </div>

    @slot('footer')
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fas fa fa-fw fa-filter"></i>
            @lang('movies.actions.filter')
        </button>
    @endslot
@endcomponent
{{ BsForm::close() }}
