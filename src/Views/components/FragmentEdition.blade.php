<span class="CMS__fragment_selector"
    id="{{ $uid }}">
    <div class="CMS__options">
        <a href="{{ route('cms::trans.edit', [
            'id' => $fragment->id,
            'redirect' => url()->current()
            ]) }}"
            class="button">
            @lang('cms::forms.Edit')
        </a>
    </div>
    {{ $fragment->value }}
</span>
