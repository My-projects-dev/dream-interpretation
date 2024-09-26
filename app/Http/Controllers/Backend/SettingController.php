<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\SettingRequest;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::query()->orderBy('id', 'DESC')->paginate(10);
        return view('backend.pages.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Cache::rememberForever('lang_code', function () {
            return Language::active()->pluck('lang_code');
        });

        return view('backend.pages.settings.create', compact( 'languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SettingRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $validated = $request->validated();

                if ($request->hasFile('image')) {
                    $imageName = rand(1, 1000) . time() . $request->image->getClientOriginalName();
                    $request->image->move(public_path('uploads/settings'), $imageName);
                    $validated['image'] = $imageName;
                }

                Setting::create($validated);

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
    public function edit(Setting $setting)
    {
        $languages = Cache::rememberForever('lang_code', function () {
            return Language::active()->pluck('lang_code');
        });

        return view('backend.pages.settings.edit', compact('setting','languages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SettingRequest $request, Setting $setting)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $imageName = rand(1, 1000) . time() . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/settings'), $imageName);
            $validated['image'] = $imageName;

            $old_img = $setting->image;
            if (File::exists(public_path('uploads/settings/' . $old_img))) {
                File::delete(public_path('uploads/settings/' . $old_img));
            }
        }

        $setting->update($validated);

        $this->cacheForget();

        return redirect()->back()->with('success', 'Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        $old_img = $setting->image;
        $setting->delete();
        if (File::exists(public_path('uploads/settings/' . $old_img))) {
            File::delete(public_path('uploads/settings/' . $old_img));
        }

        $this->cacheForget();
        return redirect()->route('settings.index')->with('success', 'Success');
    }

    private function cacheForget(){
        Cache::forget('settings');
    }
}
