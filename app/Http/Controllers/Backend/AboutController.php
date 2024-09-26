<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AboutRequest;
use App\Models\About;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::first();

        if ($about->count()) {
            return redirect()->route('about.edit', ['about' =>$about->id]);
        }

        return redirect()->route('about.create');


//        $abouts = About::query()->orderBy('id', 'DESC')->paginate(10);
//        return view('backend.pages.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Cache::rememberForever('lang_code', function () {
            return Language::active()->pluck('lang_code');
        });

        return view('backend.pages.about.create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $validated = $request->validated();

                About::create($validated);

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
    public function edit(About $about)
    {
        $languages = Cache::rememberForever('lang_code', function () {
            return Language::active()->pluck('lang_code');
        });

        return view('backend.pages.about.edit', compact('about', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutRequest $request, About $about)
    {
        $validated = $request->validated();

        $about->update($validated);

        $this->cacheForget();

        return redirect()->back()->with('success', 'Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        $about->delete();

        $this->cacheForget();
        return redirect()->route('about.index')->with('success', 'Success');
    }

    private function cacheForget()
    {
        Cache::forget('about');
    }
}
