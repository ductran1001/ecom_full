<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;

class BannerController extends Controller
{
    protected $prefix = 'backend.pages.banner.';

    public function __construct()
    {
    }
    public function index()
    {
        $banners = Banner::orderBy('created_at', 'desc')->paginate(10) ?? [];
        return view($this->prefix . 'index', [
            'title_page' => 'Banner',
            'banners' => $banners,
        ]);
    }

    public function create()
    {
        $banner = Banner::orderBy('created_at', 'desc')->get() ?? [];
        return view($this->prefix . 'create', [
            'title_page' => 'Create Banner',
            'banner' => $banner,
        ]);
    }

    public function store(BannerRequest $request)
    {
        try {
            Banner::create($request->all());
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
        $banner = Banner::findOrFail($id);
        $banners = Banner::orderBy('created_at', 'desc')->get() ?? [];
        return view($this->prefix . 'edit', [
            'title_page' => 'Update banner',
            'banner' => $banner,
            'banners' => $banners,
        ]);
    }


    public function update(BannerRequest $request, $id)
    {
        try {
            $banner = Banner::findOrFail($id);
            $banner->update($request->all());
            return response()->json([
                "status" => true,
                'msg' => 'Banner updated successfully.'
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
            $banner = Banner::findOrFail($id);
            $banner->delete();
            return response()->json([
                "status" => true,
                'msg' => 'Banner deleted successfully.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                'msg' => 'Something went wrong.'
            ], 500);
        }
    }
}
