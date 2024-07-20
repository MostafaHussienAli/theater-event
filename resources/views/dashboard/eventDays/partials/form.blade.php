@include('dashboard.errors')
{{ BsForm::date('date')->value(old('date'))->attribute('min', now()->toDateString()) }}
