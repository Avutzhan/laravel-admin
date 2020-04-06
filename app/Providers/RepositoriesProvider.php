<?php

namespace App\Providers;

use App\Repositories\ArticleRepository;
use App\Repositories\IArticleRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(IArticleRepository::class, ArticleRepository::class);
    }
}
