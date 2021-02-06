<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Client;
use App\Models\Page;
use App\Models\Skill;
use App\Models\Tag;
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
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('categories', Category::get());
        view()->share('tags', Tag::get());
        view()->share('clients', Client::get());
    }
}
