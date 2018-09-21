<?php

// This is the package configuration file

return [
    'tables_prefix' => 'cms_',

    // Top navigation
    'top_navigation_items' => [
        'home' => [
            'display' => 'cms::ui.Home',
            'route' => 'cms::dashboard',
            'icon' => 'home'
        ],
        'translations' => [
            'display' => 'cms::ui.Translations',
            'route' => 'cms::trans.index',
            'icon' => 'world'
        ]
    ]
];
