<?php

namespace LaravelCMS\Controllers;

class DashboardController extends Controller
{
    public function index ()
    {
        return view('cms::dashboard.index');
    }
}
