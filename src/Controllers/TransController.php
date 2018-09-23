<?php

namespace LaravelCMS\Controllers;

use Illuminate\Http\Request;
use LaravelCMS\Models\Translations\Language;
use LaravelCMS\Models\Translations\Fragment;

class TransController extends Controller
{
    public function index ()
    {
        return view('cms::trans.index');
    }

    public function create ()
    {
        return view('cms::trans.create');
    }

    public function store (Request $request)
    {
        $data = $request->validate([
            'key' => 'required|string',
            'value' => 'required|string',
            'locale' => 'required|string'
        ]);
        return dump($data);
    }

    public function languages ()
    {
        $available = Language::all();
        dump($available);
        return view('cms::trans.languages.index')->with('languages', $available);
    }

    public function addLanguage ()
    {
        return view('cms::trans.languages.create');
    }

    public function storeLanguage (Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|size:2'
        ]);

        $lang = Language::create($data);
        return redirect(route('cms::trans.languages.index'))->with(compact('lang'));
    }

    public function editLanguage ($slug)
    {
        $language = Language::where('slug', $slug)->first();
        return view('cms::trans.languages.edit')->with(compact('language'));
    }

    public function updateLanguage (Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|size:2'
        ]);
        $language = Language::find($request->id);
        $language->update($data);
        return redirect(route('cms::trans.languages.index'))->with('language', $language);
    }
}
