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
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);
        return view($this->prefix . 'index', [
            'title_page' => 'Category',
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view($this->prefix . 'create', [
            'title_page' => 'Create Category',
        ]);
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->except('_token');
        $data['featured'] = isset($request->featured) ? 1 : 0;
        $data['menu'] = isset($request->menu) ? 1 : 0;
        Category::create($data);
        return redirect()->route('category.index')->with('success', 'Added new category successfully');
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
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully');
    }
}
