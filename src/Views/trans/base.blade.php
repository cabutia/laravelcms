@extends('cms::layout.base')

@section('subnavigation')
    <ul class="uk-subnav">
        <li {{ active_class('cms::trans.index') }}>
            <a href="{{ route('cms::trans.index') }}">@lang('cms::ui.All translations')</a>
        </li>
        <li {{ active_class('cms::trans.create') }}>
            <a href="{{ route('cms::trans.create') }}">@lang('cms::ui.Add key')</a>
        </li>
        <li {{ active_class('cms::trans.languages.index') }}>
            <a href="{{ route('cms::trans.languages.index') }}">@lang('cms::ui.Available languages')</a>
        </li>
        <li {{ active_class('cms::trans.languages.create') }}>
            <a href="{{ route('cms::trans.languages.create') }}">@lang('cms::ui.Add language')</a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="uk-section">
        @yield('subcontent')
    </div>
@endsection
