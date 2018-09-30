@forelse ($resource as $message)
    <div class="uk-alert-{{ $resourceType }}" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p>{{ $message }}</p>
    </div>
@empty
@endforelse
