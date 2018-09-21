@extends('cms::layout.base')

@section('subnavigation')
    <ul class="uk-subnav">
        <li class="uk-active"><a href="{{ route('cms::trans.index') }}">All translations</a></li>
        <li><a href="{{ route('cms::trans.create') }}">Add key</a></li>
    </ul>
@endsection

@section('content')

    <div class="uk-section">
        @yield('subcontent')
    </div>
@endsection
