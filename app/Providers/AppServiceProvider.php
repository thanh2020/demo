<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Banner;
use App\Category;
use App\Product;
use App\brand;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('shop/home', function ($view) {
            $categories = Category::where('is_active',1)->get();
            $banners = Banner::where('is_active',1)->get();
            $categories = Category::all();
            $products = Product::all();
            $brand = brand::all();

            $view->with(['categories'=>$categories,
            'banners'=>$banners,'products'=>$products, 'brand'=>$brand]);
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
