@extends('cms::layout.base')

@section('subnavigation')
    <ul class="uk-subnav">
        <li class="uk-active"><a href="{{ route('cms::trans.index') }}">@lang('cms::ui.All translations')</a></li>
        <li><a href="{{ route('cms::trans.create') }}">@lang('cms::ui.Add key')</a></li>
        <li><a href="{{ route('cms::trans.languages.index') }}">@lang('cms::ui.Available languages')</a></li>
        <li><a href="{{ route('cms::trans.languages.create') }}">@lang('cms::ui.Add language')</a></li>
    </ul>
@endsection

@section('content')
    <div class="uk-section">
        @yield('subcontent')
    </div>
@endsection
