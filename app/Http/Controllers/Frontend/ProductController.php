<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $prefix = 'frontend.pages.';
    public function __construct()
    {

    }
    public function index()
    {
        return view($this->prefix . 'product');
    }
}
