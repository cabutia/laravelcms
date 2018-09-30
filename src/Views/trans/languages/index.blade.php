@extends('cms::trans.base')

@section('title', 'cms::ui.Available languages')

@section('subcontent')
    <table class="uk-table">
        <thead>
            <tr>
                <th>@lang('cms::forms.Name')</th>
                <th>@lang('cms::forms.Slug')</th>
                <th>@lang('cms::forms.Actions')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($languages as $language)
                <tr>
                    <td>{{ $language->name }}</td>
                    <td>{{ $language->slug }}</td>
                    <td class="uk-inline">
                        <a class="uk-button uk-button-link uk-button-small"
                           href="{{ route('cms::trans.languages.edit', $language->slug) }}">
                            @lang('cms::forms.Edit')
                        </a>
                        <form action="{{ route('cms::trans.languages.delete') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $language->id }}">
                            <button type="submit" class="uk-button uk-button-link uk-button-small">
                                @lang('cms::forms.Delete')
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
