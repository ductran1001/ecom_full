<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    protected $prefix = 'backend.pages.dashboard.';

    public function __construct()
    {
    }

    public function index()
    {
        return view($this->prefix . 'index');
    }
}
