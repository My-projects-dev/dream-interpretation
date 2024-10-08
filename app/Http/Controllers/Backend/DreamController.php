<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\DreamRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Dream;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class DreamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dreams = Dream::query()->orderBy('id', 'DESC')->paginate(9);
        return view('backend.pages.dreams.index', compact('dreams'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Cache::rememberForever('lang_code', function () {
            return Language::active()->pluck('lang_code');
        });

        return view('backend.pages.dreams.create', compact( 'languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DreamRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $validated = $request->validated();

                if ($request->hasFile('image')) {
                    $imageName = rand(1, 1000) . time() . $request->image->getClientOriginalName();
                    $request->image->move(public_path('uploads/dreams'), $imageName);
                    $validated['image'] = $imageName;
                }

                Dream::create($validated);

                $this->cacheForget();
            });
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred.');
        }

        return redirect()->route('dreams.index')->with('success', 'Created successfully.');
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
    public function edit(Dream $dream)
    {
        $languages = Cache::rememberForever('lang_code', function () {
            return Language::active()->pluck('lang_code');
        });

        return view('backend.pages.dreams.edit', compact('dream','languages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DreamRequest $request, Dream $dream)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $imageName = rand(1, 1000) . time() . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/dreams'), $imageName);
            $validated['image'] = $imageName;

            $old_img = $dream->image;
            if (File::exists(public_path('uploads/dreams/' . $old_img))) {
                File::delete(public_path('uploads/dreams/' . $old_img));
            }
        }

        $dream->update($validated);

        $this->cacheForget();

        return redirect()->back()->with('success', 'Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dream $dream)
    {
        $old_img = $dream->image;
        $dream->delete();
        if (File::exists(public_path('uploads/dreams/' . $old_img))) {
            File::delete(public_path('uploads/dreams/' . $old_img));
        }

        $this->cacheForget();
        return redirect()->route('dreams.index')->with('success', 'Success');
    }

    private function cacheForget(){
        Cache::forget('dreams');
    }

    public function search(Request $request)
    {
        $name = strip_tags($request->search);

        if (empty(trim($name))) {
            return redirect()->route('dreams.index');
        }

        $tokens = explode(' ', $name);
        $columns = ['name', 'keywords', 'title', 'text'];

        $dreams = Dream::query()
            ->active()
            ->latest()
            ->whereHas('translations', function ($query) use ($columns, $tokens) {
                $query->where(function ($query) use ($tokens, $columns) {
                    foreach ($columns as $column) {
                        foreach ($tokens as $token) {
                            $query->orWhereRaw("SOUNDEX($column) = SOUNDEX(?)", [$token])
                                ->orWhere($column, 'LIKE', '%' . $token . '%');
                        }
                    }
                });
            })
            ->paginate(9);

        return view('backend.pages.dreams.index', compact('dreams'));
    }

}
