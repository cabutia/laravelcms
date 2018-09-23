@extends('cms::trans.base')

@section('title', 'cms::ui.Add language')

@section('subcontent')
    <form class="uk-form-horizontal" action="{{ route('cms::trans.languages.store') }}" method="POST">
        <legend class="uk-legend">@lang('cms::ui.Add a language to the application')</legend>

        <div class="uk-margin">
            <label class="uk-form-label" for="name">@lang('cms::forms.Name')</label>
            <div class="uk-form-controls">
                <input type="text" name="name" value="{{ old('name') }}" class="uk-input" placeholder="e.g.: English" required>
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="slug">@lang('cms::forms.Slug')</label>
            <div class="uk-form-controls">
                <input type="text" name="slug" value="{{ old('slug') }}" class="uk-input" placeholder="e.g.: en" required>
            </div>
        </div>

        <div class="uk-margin uk-align-right">
            <button class="uk-button uk-button-primary">@lang('cms::forms.submit')</button>
        </div>
    </form>
@endsection
