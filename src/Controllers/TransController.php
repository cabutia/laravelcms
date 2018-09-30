<?php

namespace LaravelCMS\Controllers;

use Illuminate\Http\Request;
use LaravelCMS\Helpers\Response;
use LaravelCMS\Models\Translations\Language;
use LaravelCMS\Models\Translations\Fragment;

use LaravelCMS\Requests\Translations\CreateLanguageRequest;

class TransController extends Controller
{

    /**
     * Retrieves all the translation fragments
     * @return View
     */
    public function index ()
    {
        $fragments = Fragment::with('language')->orderBy('key', 'language')->get();
        return Response::view('trans.index')
            ->with(compact('fragments'))
            ->send();
    }

    /**
     * Adds a new translation key => value pair
     * @return View
     */
    public function create ()
    {
        $languages = Language::all();
        return Response::view('trans.create')
            ->with(compact('languages'))
            ->send();
    }

    /**
     * Stores a new translated fragment
     * @param  Request
     * @return Redirect
     */
    public function store (Request $request)
    {
        $data = $request->validate([
            'key' => 'required|string',
            'value' => 'required|string',
            'language_id' => 'required|string'
        ]);
        $fragment = Fragment::create($data);
        return Response::redirect('trans.index')
            ->with(compact('fragment'))
            ->send();
    }

    public function edit ($id)
    {
        $fragment = Fragment::find($id);
        $languages = Language::all();
        return Response::view('trans.edit')
            ->with(compact('fragment', 'languages'))
            ->send();
    }

    public function update (Request $request)
    {
        $data = $request->validate([
            'id' => 'required',
            'key' => 'required|string',
            'value' => 'required|string',
            'language_id' => 'required'
        ]);

        $fragment = Fragment::find($request->id);
        $fragment->update($data);
        return Response::redirect('trans.index')
            ->with(compact('fragment'))
            ->send();
    }

    public function delete (Request $request)
    {

    }

    /**
     * Retrieves all the available languages
     * @return View
     */
    public function languages ()
    {
        $available = Language::all();
        return Response::view('trans.languages.index')
            ->with('languages', $available)
            ->send();
    }

    /**
     * Adds a new language to the available list
     * @return View
     */
    public function addLanguage ()
    {
        return Response::view('trans.languages.create')->send();
    }

    /**
     * Stores a new language
     * @param  Request
     * @return Redirect
     */
    public function storeLanguage (Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|size:2'
        ]);

        $lang = Language::create($data);
        return Response::redirect('trans.languages.index')
            ->with(compact('lang'))
            ->send();
    }

    /**
     * Shows the language edition page
     * @param  String
     * @return View
     */
    public function editLanguage ($slug)
    {
        $language = Language::where('slug', $slug)->first();
        return Response::view('trans.languages.edit')
            ->with(compact('language'))
            ->send();
    }

    /**
     * Updates a language data
     * @param  Request
     * @return Redirect
     */
    public function updateLanguage (Request $request)
    {
        $data = $request->validate([
            'id' => 'required',
            'name' => 'required|string',
            'slug' => 'required|string|size:2'
        ]);
        $language = Language::find($request->id);
        $language->update($data);
        return Response::redirect('trans.languages.index')
            ->with(compact('language'))
            ->send();
    }

    /**
     * Deletes a language
     * @param  Request
     * @return Redirect
     */
    public function deleteLanguage (Request $request)
    {
        $data = $request->validate(['id' => 'required']);
        $language = Language::find($request->id);
        $language->delete();
        return Response::redirect('trans.languages.index')
            ->with(compact('language'))
            ->send();
    }
}
