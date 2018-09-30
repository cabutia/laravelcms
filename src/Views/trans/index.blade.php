@extends('cms::trans.base')

@section('title', 'cms::ui.Translations')

@section('subcontent')
    <table class="uk-table uk-table-divider uk-table-striped">
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
                    <td class="uk-flex uk-flex-column uk-flex-middle">
                        <form action="{{ route('cms::trans.delete') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $fragment->id }}">
                            <button type="submit" class="uk-button uk-button-link uk-button-small">
                                @lang('cms::forms.Delete')
                            </button>
                        </form>
                        <a class="uk-button uk-button-link uk-button-small"
                            href="{{ route('cms::trans.edit', $fragment->id) }}">
                            @lang('cms::forms.Edit')
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
