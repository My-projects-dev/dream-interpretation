<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Dream;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SitemapController extends Controller
{
    public function index()
    {
        $urls = [
            URL::to('/'),
            URL::to('/about'),
            URL::to('/contact'),
        ];


        $dreams = Cache::rememberForever('dreams', function () {
            return Dream::query()->active()->latest()->get();
        });

        foreach ($dreams as $dream) {
            $urls[] = URL::to('/dream/' . $dream->appUrl);
        }

        $content = view('sitemap', compact('urls'))->render();

        return Response::make($content, 200, ['Content-Type' => 'application/xml']);
    }
}
