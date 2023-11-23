<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $prefix = 'backend.pages.product.';

    public function __construct()
    {
    }
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(10) ?? [];
        return view($this->prefix . 'index', [
            'title_page' => 'Products',
            'products' => $products,
        ]);
    }

    public function create()
    {
        $product = Product::orderBy('created_at', 'desc')->get() ?? [];
        return view($this->prefix . 'create', [
            'title_page' => 'Create Product',
            'product' => $product,
        ]);
    }

    public function store(ProductRequest $request)
    {
        $photos = $request->photo;

        $count = count(explode(',', $photos));

        if ($count >= 2) {
            return response()->json([
                "status" => false,
                'msg' => 'Please provide only one photo.'
            ], 400);
        }

        try {
            Product::create($request->all());
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
        $product = Product::findOrFail($id);

        return view($this->prefix . 'edit', [
            'title_page' => 'Update product',
            'product' => $product,
        ]);
    }


    public function update(ProductRequest $request, $id)
    {
        try {
            $product = Product::findOrFail($id);

            $photos = $request->photo;

            if ($photos) {
                $count = count(explode(',', $photos));

                if ($count >= 2) {
                    return response()->json([
                        "status" => false,
                        'msg' => 'Please provide only one photo.'
                    ], 400);
                }
            }

            $product->update($request->all());
            return response()->json([
                "status" => true,
                'msg' => 'Product updated successfully.'
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
            $product = Product::findOrFail($id);
            $product->delete();
            return response()->json([
                "status" => true,
                'msg' => 'Product deleted successfully.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                'msg' => 'Something went wrong.'
            ], 500);
        }
    }
}
