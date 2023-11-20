<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $prefix = 'frontend.pages.home.';
    public function __construct()
    {

    }
    public function index()
    {
        return view($this->prefix . 'index');
    }
}
