<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;

class BrandController extends Controller
{
    protected $prefix = 'backend.pages.brand.';

    public function __construct()
    {
    }
    public function index()
    {
        $brands = Brand::orderBy('created_at', 'desc')->get() ?? [];
        return view($this->prefix . 'index', [
            'title_page' => 'Brand',
            'brands' => $brands,
        ]);
    }

    public function create()
    {
        $brands = Brand::orderBy('created_at', 'desc')->get() ?? [];
        return view($this->prefix . 'create', [
            'title_page' => 'Create brand',
            'brands' => $brands,
        ]);
    }

    public function store(BrandRequest $request)
    {
        try {
            Brand::create($request->all());
            return response()->json([
                "status" => true,
                'msg' => 'Create new successfully.'
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                'msg' => 'Something went wrong.'
            ], 500);
        }
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        $brands = Brand::orderBy('created_at', 'desc')->get() ?? [];
        return view($this->prefix . 'edit', [
            'title_page' => 'Update brand',
            'brand' => $brand,
            'brands' => $brands,
        ]);
    }


    public function update(BrandRequest $request, $id)
    {
        try {
            $brand = Brand::findOrFail($id);
            $brand->update($request->all());
            return response()->json([
                "status" => true,
                'msg' => 'Brand updated successfully.'
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                'msg' => 'Something went wrong.'
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $brand = Brand::findOrFail($id);
            $brand->delete();
            return response()->json([
                "status" => true,
                'msg' => 'Brand deleted successfully.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                'msg' => 'Something went wrong.'
            ], 500);
        }
    }
}
