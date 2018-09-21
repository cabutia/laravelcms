<?php

namespace LaravelCMS\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index ()
    {
        return view('cms::admin.index');
    }
}
