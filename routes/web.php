<?php

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\DreamCategoryController;
use App\Http\Controllers\Backend\DreamController;
use App\Http\Controllers\Backend\LanguageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\SettingController;

use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\SitemapController;
use App\Http\Controllers\Frontend\AboutController as AboutFront;
use App\Http\Controllers\Frontend\DreamController as DreamFront;
use App\Http\Controllers\Frontend\LanguageController as LangFront;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

Route::group(['prefix' => 'backend', 'middleware' => 'auth'], function () {
    Route::fallback(fn() => redirect(route('dashboard')));
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('admin', AdminController::class);
    Route::resource('about', AboutController::class);
    Route::resource('dream_categories', DreamCategoryController::class);
    Route::resource('dreams', DreamController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('languages', LanguageController::class);

});

// ---------------------------------------------------------------------------------------------------------------------------
//              FRONT
// ---------------------------------------------------------------------------------------------------------------------------

Route::group(['middleware' => 'language', 'prefix' => '{language?}'], function () {
    Route::fallback(fn() => redirect(route('home')));
    Route::get('/', [IndexController::class, 'index'])->name('home');
    Route::get('/about', [AboutFront::class, 'index'])->name('about');
    Route::get('lang/{lang}', LangFront::class)->name('lang.switch');
    Route::get('/sitemap.xml', [SitemapController::class, 'index']);

    Route::controller(IndexController::class)
        ->prefix('search')
        ->as('search.')
        ->group(function () {
            Route::match(['get', 'post'],'/', 'search')->name('dream');
        });

    Route::controller(DreamFront::class)
        ->prefix('dream')
        ->as('dreams.')
        ->group(function () {
            Route::get('/{slug}', 'show')->name('show');
        });

    Route::controller(ContactController::class)
        ->prefix('contact')
        ->as('contact.')
        ->group(function () {
            Route::get('/', 'form')->name('form');
            Route::post('/send', 'send')->name('send');
        });
});

require __DIR__ . '/auth.php';
