<?php

namespace App\Providers;
use App\Brand;
use Illuminate\Support\Facades\Schema;
use View;
use App\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        Schema::defaultStringLength(191);
        view()->composer('*',function ($view){

            $categories = Category::where('publication_status', 1)->get();
            $view->with('categories',$categories);

            $brands = Brand::where('publication_status', 1)->get();
            $view->with('brands',$brands);
        });
    }
}
