<?php

namespace App\Providers;

use App\Models\Hall;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
//         $popupItem = Hall::query()->where('country', \session('country'))->where('is_popup', '1')->orWhere('order', '2')->get();
//         if (count($popupItem) >= 1) {
//             View::share('popupItem', $popupItem->random());
//         }
    }
}
