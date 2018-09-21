<?php

namespace LaravelCMS\Controllers;

use Illuminate\Http\Request;

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
}
