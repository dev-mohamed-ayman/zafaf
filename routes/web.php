<?php

use App\Http\Controllers\Admin\AnlysisController;
use App\Http\Controllers\Admin\HallController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\RateController as AdminRateController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::view('country', 'frontend.country')->name('country');
Route::get('country/{country}', function ($country) {
    \Illuminate\Support\Facades\Session::put('country', $country);
    return redirect()->route('home');
})->name('set-country');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

    Route::get('test', function () {
        return 'test';
    });

    Route::middleware('guest')->controller(\App\Http\Controllers\AuthController::class)->group(function () {
        Route::get('login', 'login')->name('login');
        Route::post('login', 'postLogin')->name('login.post');
        Route::get('register', 'register')->name('register');
        Route::post('register', 'postRegister')->name('register.post');
        Route::get('register-company', 'registerCompany')->name('register.company');
        Route::post('register-company', 'postRegisterCompany')->name('register.company.post');
    });
    Route::get('logout', function () {
        auth()->logout();
        return redirect('/')->with('success', 'تم تسجيل الخروج بنجاح');
    })->name('logout');

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/show-phone/{hall}', [HomeController::class, 'showPhone'])->name('show.phone');
    Route::get('/slide-images/{hall}', [HomeController::class, 'slideImages'])->name('slide.images');
    Route::get('/search', [HomeController::class, 'search'])->name('search');
    Route::get('/offer', [HomeController::class, 'offer'])->name('offer');
    Route::get('/hall-plan', [HomeController::class, 'hallPlan'])->name('hall.plan');
    Route::get('/albums', [HomeController::class, 'albums'])->name('albums');
    Route::get('/hall-details/{hall}', [HomeController::class, 'hallDetails'])->name('hall.details');
    Route::view('/about', 'frontend.about')->name('about');
    Route::view('/terms', 'frontend.terms')->name('terms');
    Route::resource('favorite', FavoriteController::class)->middleware('auth');
    Route::resource('make-order', App\Http\Controllers\OrderController::class);
    Route::get('rate/{hall}', [RateController::class, 'rate'])->name('rate')->middleware('auth');
    Route::get('blog/{blog}', [HomeController::class, 'blog'])->name('blog');
    Route::view('blogs', 'frontend.blogs', ['cities' => \App\Models\City::all()])->name('blogs');

});

// Dashboard
Route::prefix('dashboard')->middleware('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('index');
    Route::get('/top-ten', [\App\Http\Controllers\Admin\DashboardController::class, 'topTen'])->name('top.ten');

    // City
    Route::resource('city', \App\Http\Controllers\Admin\CityController::class);

    // User
    Route::resource('user', \App\Http\Controllers\Admin\UserController::class);

    // Role
    Route::resource('role', \App\Http\Controllers\Admin\RoleController::class);

    // Hall
    Route::resource('hall', \App\Http\Controllers\Admin\HallController::class);
    Route::post('hall/search', [HallController::class, 'search'])->name('hall.search');
    // Hall Edit
    Route::resource('hall-edit', \App\Http\Controllers\Admin\HallEditController::class);

    // Offer
    Route::resource('offer', \App\Http\Controllers\Admin\OfferController::class);

    // Order
    Route::resource('order', App\Http\Controllers\Admin\OrderController::class);

    // Company
    Route::resource('company', App\Http\Controllers\Admin\CompanyController::class);

    // // Image
    // Route::resource('image', ImageController::class);

    // Rate
    Route::resource('rate', AdminRateController::class);

    // BlogController
    Route::resource('blog', \App\Http\Controllers\Admin\BlogController::class);

    // Analysis
    Route::name('analysis.')->prefix('analysis')->controller(AnlysisController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/get-halls/{user}', 'getHalls')->name('get.halls');
        Route::get('/details', 'details')->name('details');
    });

    // Meeting Record
    Route::resource('meeting-record', \App\Http\Controllers\Admin\MeetingRecordController::class);

    // Album
    Route::resource('album', \App\Http\Controllers\Admin\AlbumController::class);

    // Setting
    Route::resource('setting', SettingController::class);

    // Team
    Route::resource('team', \App\Http\Controllers\Admin\TeamController::class);
});

// Image
Route::resource('image', ImageController::class);

// Dashboard Company
Route::prefix('company/dashboard')->middleware('company')->name('company.')->group(function () {

    // Dashboard
    Route::get('/', [\App\Http\Controllers\Company\DashboardController::class, 'index'])->name('index');
    Route::get('/top-ten', [\App\Http\Controllers\Company\DashboardController::class, 'topTen'])->name('top.ten');

    // Meeting Record
    Route::resource('meeting-record', \App\Http\Controllers\Company\MeetingRecordController::class);

    // Hall
    Route::resource('hall', \App\Http\Controllers\Company\HallController::class);

    // Offer
    Route::resource('offer', \App\Http\Controllers\Company\OfferController::class);

    // Order
    Route::resource('order', App\Http\Controllers\Company\OrderController::class);

    // Analysis
    Route::name('analysis.')->prefix('analysis')->controller(App\Http\Controllers\Company\AnlysisController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/details', 'details')->name('details');
    });
});
