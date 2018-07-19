<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //registrar la vista al composer y pasar un funcion, que le agrega un parametro con un valor 
        view()->composer('layouts.sidebar', function ($view) {
            $archives = \App\Post::archives();
            $tags = \App\Tag::has('posts')->pluck('name');

            //$view->with('archives', \App\Post::archives());
            //$view->with('tags', \App\Tag::has('posts')->pluck('name'));
            $view->with(compact(['archives', 'tags']));
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
