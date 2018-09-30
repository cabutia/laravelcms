<?php

namespace LaravelCMS\Helpers;

use App;
use Cache;
use LaravelCMS\Models\Translations\Language;
use LaravelCMS\Models\Translations\Fragment;

class TranslationLoader
{
    public static function load ($key) {
        $lang = App::getLocale();
        Cache::flush();
        return Cache::remember($lang.'.'.$key, 3600, function () use ($key, $lang) {
            $language = Language::where('slug', $lang)->first();
            if (!$language) {
                return '###'.$key;
            };

            $fragment = $language->fragments()->where('key', $key)->first();
            if (!$fragment) {
                return '###'.$key;
            };
            $uid = 'CMS__'.uniqid();
            return view('cms::components.FragmentEdition')->with([
                'uid' => $uid,
                'fragment' => $fragment
            ])->render();
        });

    }
}
