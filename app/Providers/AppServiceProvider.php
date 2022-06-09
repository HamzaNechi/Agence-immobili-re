<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\article;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::composer('vitrine.annonces', function ($view) {
            $type=article::select('type')->distinct()->get();
            $MaxSuperficie=article::select('superficie')->orderBy('superficie', 'desc')->first();
            $MinSuperficie=article::select('superficie')->orderBy('superficie', 'asc')->first();
            $Maxprix=article::select('prix')->orderBy('prix', 'desc')->first();
            $Minprix=article::select('prix')->orderBy('prix', 'asc')->first();

            $view->with('type', $type);
            $view->with('MaxSuperficie', $MaxSuperficie);
            $view->with('MinSuperficie', $MinSuperficie);
            $view->with('Maxprix', $Maxprix);
            $view->with('Minprix', $Minprix);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
