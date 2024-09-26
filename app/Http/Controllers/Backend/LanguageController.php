<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\LanguageRequest;
use App\Models\Language;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::paginate(10);
        return view('backend.pages.languages.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.languages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LanguageRequest $request)
    {

        try {
            DB::transaction(function () use ($request) {
                $validated = $request->validated();

                Language::create($validated);
                $this->cacheForget();
            });
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred.');
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
    public function edit(Language $language)
    {
        return view('backend.pages.languages.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LanguageRequest $request, Language $language)
    {
        $validated = $request->validated();

        $language->update($validated);

        $this->cacheForget();

        return redirect()->back()->with('success', 'Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Language $language)
    {
        $language->delete();

        $this->cacheForget();
        return redirect()->route('languages.index')->with('success', 'Success');
    }

    private function cacheForget(){
        Cache::forget('languages');
        Cache::forget('lang_code');
        Cache::forget('active_languages');
    }
}

