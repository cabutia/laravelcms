@extends('cms::trans.base')

@section('title', 'cms::ui.Translations')

@section('subcontent')
    <table class="uk-table">
        <thead>
            <tr>
                <th>@lang('cms::forms.Key')</th>
                <th>@lang('cms::forms.Value')</th>
                <th>@lang('cms::forms.Language')</th>
                <th>@lang('cms::forms.Actions')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fragments as $fragment)
                <tr>
                    <td>{{ $fragment->key }}</td>
                    <td>{{ $fragment->value }}</td>
                    <td>{{ $fragment->language->name }}</td>
                    <td class="uk-inline">
                        <button type="button" class="uk-button uk-button-default">@lang('cms::ui.Actions')</button>
                        <div uk-dropdown="mode: click">
                            <ul class="uk-list">
                                <li>
                                    <a class="uk-button uk-button-link uk-button-small"
                                       href="{{ route('cms::trans.edit', $fragment->id) }}">
                                        @lang('cms::forms.Edit')
                                    </a>
                                </li>
                                <li>
                                    <form action="{{ route('cms::trans.delete') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $fragment->id }}">
                                        <button type="submit" class="uk-button uk-button-link uk-button-small">
                                            @lang('cms::forms.Delete')
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
