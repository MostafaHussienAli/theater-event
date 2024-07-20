@include('dashboard.errors')
{{ BsForm::time('start_time')->value(old('start_time')) }}
{{ BsForm::time('end_time')->value(old('end_time')) }}
