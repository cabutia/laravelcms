<!DOCTYPE html>
<html lang="{{ \App::getLocale() }}">
    <head>
        <meta charset="utf-8">
        <title>@yield('title') | CMS Administration | {{ config('app.name') }}</title>
        <link rel="stylesheet" href="{{ asset('/vendor/cms/cms.css') }}">
    </head>
    <body>
        @yield('content')

        <script src="{{ asset('/vendor/cms/cms.js') }}"></script>
    </body>
</html>
