@extends('cms::trans.base')

@section('title', 'cms::ui.Add translation')

@section('subcontent')
    <form class="uk-form-horizontal" action="{{ route('cms::trans.store') }}" method="POST">
        <legend class="uk-legend">@lang('cms::ui.Add a translated fragment')</legend>

        <div class="uk-margin">
            <label class="uk-form-label" for="key">@lang('cms::forms.Key')</label>
            <div class="uk-form-controls">
                <input type="text" name="key" value="{{ old('key') }}" class="uk-input" placeholder="e.g.: file.key" required>
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="value">@lang('cms::forms.Value')</label>
            <div class="uk-form-controls">
                <input type="text" name="value" value="{{ old('value') }}" class="uk-input" placeholder="e.g.: This is a value" required>
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="locale">@lang('cms::forms.Locale')</label>
            <div class="uk-form-controls">
                <input type="text" name="locale" value="{{ old('locale') }}" class="uk-input" placeholder="e.g.: EN | ES | FR" required>
            </div>
        </div>

        <div class="uk-margin uk-align-right">
            <button class="uk-button uk-button-primary">@lang('cms::forms.submit')</button>
        </div>
    </form>
@endsection
