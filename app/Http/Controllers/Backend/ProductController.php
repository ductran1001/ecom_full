<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    protected $prefix = 'backend.pages.product.';

    public function __construct()
    {
    }
    public function index()
    {
        $products = Product::with('category')->orderBy('created_at', 'desc')->paginate(10) ?? [];
        return view($this->prefix . 'index', [
            'title_page' => 'Products',
            'products' => $products,
        ]);
    }

    public function create()
    {
        $categories = Category::getCategoryTree();
   
        return view($this->prefix . 'create', [
            'title_page' => 'Create product',
            'categories' => $categories,
        ]);
    }

    public function store(ProductRequest $request)
    {
        $thumbnails = $request->thumbnail;

        $count = count(explode(',', $thumbnails));

        if ($count >= 2) {
            return response()->json([
                "status" => false,
                'msg' => 'Please provide only one thumbnail.'
            ], 400);
        }

        try {
            Product::create($request->all());
            return response()->json([
                "status" => true,
                'msg' => 'Create new successfully.'
            ], 201);
        } catch (\Throwable $th) {
            dd($th);
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
        $categories = Category::getCategoryTree();

        return view($this->prefix . 'edit', [
            'title_page' => 'Update product',
            'product' => $product,
            'categories' => $categories,
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
