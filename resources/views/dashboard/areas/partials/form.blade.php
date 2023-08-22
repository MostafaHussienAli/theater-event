@include('dashboard.errors')
@bsMultilangualFormTabs
{{ BsForm::text('name') }}
@endBsMultilangualFormTabs

@isset($cityId)
    <input type="hidden" name="city_id" value="{{ $cityId }}">
@else
    <input type="hidden" name="city_id" value="{{ $city->id }}">
@endisset


