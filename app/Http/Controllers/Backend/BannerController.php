<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class BannerController extends Controller
{
    protected string $prefix = 'backend.pages.banner.';

    public function index(): View
    {
        $banners = Banner::orderByDesc('created_at')->paginate(10);
        return view($this->prefix . 'index', [
            'title_page' => 'Banner',
            'banners' => $banners,
        ]);
    }

    public function create(): View
    {
        return view($this->prefix . 'create', [
            'title_page' => 'Create Banner',
        ]);
    }

    public function store(BannerRequest $request): JsonResponse
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

    public function edit($id): View
    {
        $banner = Banner::findOrFail($id);

        return view($this->prefix . 'edit', [
            'title_page' => 'Update banner',
            'banner' => $banner,
        ]);
    }

    public function update(BannerRequest $request, $id): JsonResponse
    {
        try {
            $banner = Banner::findOrFail($id);
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

    public function destroy($id): JsonResponse
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
