<!DOCTYPE html>
<html lang="{{ \App::getLocale() }}">
    <head>
        <meta charset="utf-8">
        <title>{{ __($__env->yieldContent('title')) }} | CMS Administration | {{ config('app.name') }}</title>
        <link rel="stylesheet" href="{{ asset('/vendor/cms/cms.css') }}">
        <link rel="stylesheet" href="{{ asset('/vendor/cms/uikit.min.css') }}">
        <script src="{{ asset('/vendor/cms/uikit.min.js') }}"></script>
        <script src="{{ asset('/vendor/cms/uikit-icons.min.js') }}"></script>
    </head>
    <body>
        @include('cms::components.TopNavigation')

        <div class="uk-section uk-section-default">
            @errors
            {{-- <pre>{!! var_dump([
                    'errors' => isset($__cms_errors) ? $__cms_errors : session('__cms_errors'),
                    'messages' => isset($__cms_messages) ? $__cms_messages : session('__cms_messages'),
                    'successes' => isset($__cms_successes) ? $__cms_successes : session('__cms_successes'),
                    'warnings' => isset($__cms_warnings) ? $__cms_warnings : session('__cms_warnings')
                    ]) !!}</pre> --}}
            <div class="uk-container uk-container-small uk-relative">
                <h1 class="uk-heading-divider">{{ __($__env->yieldContent('title')) }}</h1>
                @yield('subnavigation')
                @yield('content')
            </div>
        </div>

        <script src="{{ asset('/vendor/cms/cms.js') }}"></script>
    </body>
</html>
