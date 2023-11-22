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
        return view($this->prefix . 'index', [
            'title_page' => 'Category',
            'categories' => Category::orderBy('created_at', 'desc')->paginate(10) ?? [],
        ]);
    }

    public function create()
    {
        return view($this->prefix . 'create', [
            'title_page' => 'Create Category',
            'categories' => Category::where('parent_id', 0)->orderBy('created_at', 'desc')->get() ?? [],
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
        return view($this->prefix . 'edit', [
            'title_page' => 'Category',
            'category' => $category,
        ]);
    }


    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $data = $request->except('_token');
        $data['featured'] = isset($request->featured) ? 1 : 0;
        $data['menu'] = isset($request->menu) ? 1 : 0;
        $category->update($data);
        return redirect()->route('category.index')->with('success', 'Category updated successfully');
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