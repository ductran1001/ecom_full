<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    protected $prefix = 'backend.pages.category.';

    public function __construct()
    {
    }
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->with('parent')->paginate(10) ?? [];
        return view($this->prefix . 'index', [
            'title_page' => 'Category',
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        $categories = Category::where('parent_id', 0)->orderBy('created_at', 'desc')->get() ?? [];
        return view($this->prefix . 'create', [
            'title_page' => 'Create Category',
            'categories' => $categories,
        ]);
    }

    public function store(CategoryRequest $request)
    {
        try {
            Category::create($request->all());
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
        $category = Category::findOrFail($id);
        $categories = Category::where('parent_id', 0)->where('id', '!=', $id)->orderBy('created_at', 'desc')->get() ?? [];
        return view($this->prefix . 'edit', [
            'title_page' => 'Update Category',
            'category' => $category,
            'categories' => $categories,
        ]);
    }


    public function update(CategoryRequest $request, $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->update($request->all());
            return response()->json([
                "status" => true,
                'msg' => 'Category updated successfully.'
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
            $category = Category::findOrFail($id);
            $category->delete();
            return response()->json([
                "status" => true,
                'msg' => 'Category deleted successfully.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                'msg' => 'Something went wrong.'
            ], 500);
        }
    }
}