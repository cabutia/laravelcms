{{-- <nav class="cms__top-navigation">
    <ul>

    </ul>
</nav> --}}

<nav class="uk-navbar-container uk-navbar-transparent uk-background-primary uk-light" uk-navbar>
    <div class="uk-navbar-right">
        <ul class="uk-navbar-nav">
            @foreach (config('cms.top_navigation_items') as $navItem)
                <li>
                    <a class="uk-icon-link"
                       uk-icon="{{ $navItem['icon'] }}"
                       uk-tooltip="title: {{ __($navItem['display']) }}; pos: bottom"
                       href="{{
                           $navItem['route'] === '#' || $navItem['route'] === '' || !$navItem['route'] || !\Route::has($navItem['route'])
                           ? '#' : route($navItem['route'])
                       }}">
                   </a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>
