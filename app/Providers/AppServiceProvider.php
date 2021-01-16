<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\Skill;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultstringLength(191);

        view()->share('categories' , Category::get());
        view()->share('skills' , Skill::get());
        view()->share('pages' , Page::get());

    }
}
