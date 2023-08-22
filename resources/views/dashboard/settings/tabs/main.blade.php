<x-layout :title="trans('settings.tabs.main')" :breadcrumbs="['dashboard.settings.index']">
    {{ BsForm::resource('settings')->patch(route('dashboard.settings.update')) }}
    @component('dashboard::components.box')

        @bsMultilangualFormTabs

        {{ BsForm::text('name')->value(Settings::locale($locale->code)->get('name')) }}

        {{ BsForm::text('copyright')->value(Settings::locale($locale->code)->get('copyright')) }}

        @endBsMultilangualFormTabs

        @if(is_array(trans('settings.dashboard_templates')) && ! empty(trans('settings.dashboard_templates')))
            {{ BsForm::select('dashboard_template')
                    ->options(trans('settings.dashboard_templates'))
                    ->value(Settings::get('dashboard_template', config('layouts.dashboard'))) }}
        @endif

        @if(is_array(trans('settings.frontend_templates')) && ! empty(trans('settings.frontend_templates')))
            {{ BsForm::select('frontend_template')
                    ->options(trans('settings.frontend_templates'))
                    ->value(Settings::get('frontend_template', config('layouts.frontend'))) }}
        @endif

        <select2
            placeholder="@lang('pages.filter')"
            name="terms"
            id="terms"
            value="{{Settings::get('terms')}}"
            label="@lang('settings.attributes.terms')"
            remote-url="{{ route('api.pages.select') }}"
        ></select2>
        <select2
            placeholder="@lang('pages.filter')"
            name="about_us"
            id="about_us"
            value="{{Settings::get('about_us')}}"
            label="@lang('settings.attributes.about')"
            remote-url="{{ route('api.pages.select') }}"
        ></select2>
        <select2
            placeholder="@lang('pages.filter')"
            name="privacy"
            id="privacy"
            value="{{Settings::get('privacy')}}"
            label="@lang('settings.attributes.privacy')"
            remote-url="{{ route('api.pages.select') }}"
        ></select2>

        {{ BsForm::text('android_version')->value(Settings::get('android_version'))  }}
        {{ BsForm::text('iphone_version')->value(Settings::get('iphone_version'))  }}
        {{ BsForm::text('android_url')->value(Settings::get('android_url'))  }}
        {{ BsForm::text('iphone_url')->value(Settings::get('iphone_url'))  }}
        {{ BsForm::text('welcome_comment')->value(Settings::get('welcome_comment'))  }}
        {{ BsForm::number('login_background_op')->value(Settings::get('login_background_op'))->max(99)->min(10)  }}
        {{ BsForm::text('login_background_color')->value(Settings::get('login_background_color'))  }}
        {{ BsForm::textarea('login_side_text')->value(Settings::get('login_side_text'))->attribute(['class'=>'textarea'])  }}



        <div class="row">
            <div class="col-md-6">
                {{ BsForm::image('loginLogo')->collection('loginLogo')->files(optional(Settings::instance('loginLogo'))->getMediaResource('loginLogo')) }}
            </div>
            <div class="col-md-6">
                {{ BsForm::image('loginBackground')->collection('loginBackground')->files(optional(Settings::instance('loginBackground'))->getMediaResource('loginBackground')) }}
            </div>
            <div class="col-md-6">
                {{ BsForm::image('logo')->collection('logo')->files(optional(Settings::instance('logo'))->getMediaResource('logo')) }}
            </div>
            <div class="col-md-6">
                {{ BsForm::image('favicon')->collection('favicon')->files(optional(Settings::instance('favicon'))->getMediaResource('favicon')) }}
            </div>
        </div>

        @slot('footer')
            {{ BsForm::submit()->label(trans('settings.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
