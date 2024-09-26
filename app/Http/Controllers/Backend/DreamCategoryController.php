<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\DreamCategoryRequest;
use App\Models\Blog;
use App\Models\DreamCategory;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class DreamCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = DreamCategory::query()->orderBy('id', 'DESC')->paginate(10);
        return view('backend.pages.dream_categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Cache::rememberForever('lang_code', function () {
            return Language::active()->pluck('lang_code');
        });

        return view('backend.pages.dream_categories.create', compact( 'languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DreamCategoryRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $validated = $request->validated();

                if ($request->hasFile('image')) {
                    $imageName = rand(1, 1000) . time() . $request->image->getClientOriginalName();
                    $request->image->move(public_path('uploads/dream_categories'), $imageName);
                    $validated['image'] = $imageName;
                }

                DreamCategory::create($validated);

                $this->cacheForget();
            });
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
        }

        return redirect()->back()->with('success', 'Created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DreamCategory $dream_category)
    {
        $languages = Cache::rememberForever('lang_code', function () {
            return Language::active()->pluck('lang_code');
        });

        return view('backend.pages.dream_categories.edit', compact('dream_category','languages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DreamCategoryRequest $request, DreamCategory $dream_category)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $imageName = rand(1, 1000) . time() . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/dream_categories'), $imageName);
            $validated['image'] = $imageName;

            $old_img = $dream_category->image;
            if (File::exists(public_path('uploads/dream_categories/' . $old_img))) {
                File::delete(public_path('uploads/dream_categories/' . $old_img));
            }
        }

        $dream_category->update($validated);

        $this->cacheForget();

        return redirect()->back()->with('success', 'Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DreamCategory $dream_category)
    {
        $old_img = $dream_category->image;
        $dream_category->delete();
        if (File::exists(public_path('uploads/dream_categories/' . $old_img))) {
            File::delete(public_path('uploads/dream_categories/' . $old_img));
        }

        $this->cacheForget();
        return redirect()->route('dream_categories.index')->with('success', 'Success');
    }

    private function cacheForget(){
        Cache::forget('dream_categories');
    }
}
