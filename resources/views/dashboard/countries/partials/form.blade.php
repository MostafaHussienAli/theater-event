@include('dashboard.errors')
@bsMultilangualFormTabs
{{ BsForm::text('name') }}
@endBsMultilangualFormTabs
{{ BsForm::text('code') }}
{{ BsForm::text('key') }}
@isset($country)
    {{ BsForm::file('flag') }}
@else
    {{ BsForm::file('flag')}}
@endisset
{{ BsForm::radio('is_default') }}

