<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $prefix = 'backend.pages.home.';

    public function __construct()
    {
    }

    public function index()
    {
        return view($this->prefix . 'index');
    }
}
